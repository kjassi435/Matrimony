import http from 'http';
import fs from 'fs';
import path from 'path';
import crypto from 'crypto';
import { createClient } from '@libsql/client';
import { fileURLToPath } from 'url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const PUBLIC = path.join(__dirname, 'public');
const VIEWS = path.join(__dirname, 'resources', 'views');
const COMPONENTS = path.join(VIEWS, 'components');

const COOKIE_SECRET = process.env.COOKIE_SECRET || 'nayi-pahal-secret-key-2026';
const SESSION_TTL = 7 * 24 * 60 * 60 * 1000;

const MIME = {
    '.css': 'text/css', '.js': 'application/javascript', '.html': 'text/html',
    '.png': 'image/png', '.jpg': 'image/jpeg', '.jpeg': 'image/jpeg',
    '.svg': 'image/svg+xml', '.ico': 'image/x-icon', '.json': 'application/json',
    '.woff2': 'font/woff2',
};

function readFile(p) {
    try { return fs.readFileSync(p, 'utf-8'); } catch { return null; }
}

function getDb() {
    return createClient({
        url: process.env.TURSO_DB_URL,
        authToken: process.env.TURSO_AUTH_TOKEN,
    });
}

async function getUsers() {
    const db = getDb();
    const r = await db.execute('SELECT * FROM users ORDER BY created_at DESC');
    return r.rows;
}

async function getUser(id) {
    const db = getDb();
    const r = await db.execute({ sql: 'SELECT * FROM users WHERE id = ?', args: [id] });
    return r.rows[0] || null;
}

async function findUserByEmail(email) {
    const db = getDb();
    const r = await db.execute({ sql: 'SELECT * FROM users WHERE email = ?', args: [email] });
    return r.rows[0] || null;
}

async function getUserCount() {
    const db = getDb();
    const r = await db.execute('SELECT COUNT(*) as cnt FROM users');
    return Number(r.rows[0].cnt);
}

async function insertUser(user) {
    const db = getDb();
    await db.execute({
        sql: 'INSERT INTO users (id, name, email, phone, gender, password, bio, age, city, occupation, role, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
        args: [user.id, user.name, user.email, user.phone || '', user.gender || '', user.password, user.bio || '', user.age || '', user.city || '', user.occupation || '', user.role || 'user', user.createdAt || new Date().toISOString()],
    });
}

async function updateUser(id, fields) {
    const db = getDb();
    const sets = [];
    const args = [];
    for (const [k, v] of Object.entries(fields)) {
        sets.push(`${k} = ?`);
        args.push(v);
    }
    args.push(id);
    await db.execute({ sql: `UPDATE users SET ${sets.join(', ')} WHERE id = ?`, args });
}

async function updateUserPassword(id, hash) {
    const db = getDb();
    await db.execute({ sql: 'UPDATE users SET password = ? WHERE id = ?', args: [hash, id] });
}

async function getSavedProfiles(userId) {
    const db = getDb();
    const r = await db.execute({ sql: 'SELECT profile_id FROM saved_profiles WHERE user_id = ?', args: [userId] });
    return r.rows.map(row => row.profile_id);
}

async function toggleSavedProfile(userId, profileId) {
    const db = getDb();
    const existing = await db.execute({ sql: 'SELECT 1 FROM saved_profiles WHERE user_id = ? AND profile_id = ?', args: [userId, profileId] });
    if (existing.rows.length > 0) {
        await db.execute({ sql: 'DELETE FROM saved_profiles WHERE user_id = ? AND profile_id = ?', args: [userId, profileId] });
        return false;
    } else {
        await db.execute({ sql: 'INSERT INTO saved_profiles (user_id, profile_id) VALUES (?, ?)', args: [userId, profileId] });
        return true;
    }
}

async function getReviews() {
    const db = getDb();
    const r = await db.execute('SELECT * FROM reviews ORDER BY created_at DESC');
    return r.rows;
}

async function insertReview(review) {
    const db = getDb();
    await db.execute({ sql: 'INSERT INTO reviews (id, name, text, approved, created_at) VALUES (?, ?, ?, ?, ?)',
        args: [review.id, review.name || 'Anonymous', review.text, review.approved ? 1 : 0, review.createdAt || new Date().toISOString()],
    });
}

async function updateReview(id, fields) {
    const db = getDb();
    const sets = [];
    const args = [];
    for (const [k, v] of Object.entries(fields)) {
        sets.push(`${k} = ?`);
        args.push(v);
    }
    args.push(id);
    await db.execute({ sql: `UPDATE reviews SET ${sets.join(', ')} WHERE id = ?`, args });
}

async function deleteReview(id) {
    const db = getDb();
    await db.execute({ sql: 'DELETE FROM reviews WHERE id = ?', args: [id] });
}

function hashPassword(pw) {
    const salt = crypto.randomBytes(16).toString('hex');
    const hash = crypto.pbkdf2Sync(pw, salt, 1000, 64, 'sha512').toString('hex');
    return salt + ':' + hash;
}

function verifyPassword(pw, stored) {
    const [salt, hash] = stored.split(':');
    return hash === crypto.pbkdf2Sync(pw, salt, 1000, 64, 'sha512').toString('hex');
}

function signCookie(value) {
    const hmac = crypto.createHmac('sha256', COOKIE_SECRET).update(value).digest('hex');
    return value + '.' + hmac;
}

function unsignCookie(signed) {
    const dot = signed.lastIndexOf('.');
    if (dot === -1) return null;
    const value = signed.slice(0, dot);
    const hmac = signed.slice(dot + 1);
    const expected = crypto.createHmac('sha256', COOKIE_SECRET).update(value).digest('hex');
    return hmac === expected ? value : null;
}

function parseCookies(header) {
    const cookies = {};
    if (!header) return cookies;
    header.split(';').forEach(c => {
        const eq = c.indexOf('=');
        if (eq === -1) return;
        cookies[c.slice(0, eq).trim()] = c.slice(eq + 1).trim();
    });
    return cookies;
}

async function getSessionUser(cookieHeader) {
    const cookies = parseCookies(cookieHeader);
    const session = cookies.session;
    if (!session) return null;
    const unsigned = unsignCookie(session);
    if (!unsigned) return null;
    const [userId, timestamp] = unsigned.split(':');
    if (!userId || !timestamp || Date.now() - Number(timestamp) > SESSION_TTL) return null;
    return await getUser(userId);
}

function requireAuth(req, res) { /* called async, check authUser present */ }
function requireAdmin(req, res) { /* called async, check role */ }

function getURLParams(req) {
    const p = new URLSearchParams(req.url.split('?')[1] || '');
    return { error: p.get('error') || '', success: p.get('success') || '' };
}

const manifest = JSON.parse(readFile(path.join(PUBLIC, 'build', 'manifest.json')) || '{}');
const cssFile = manifest['resources/css/app.css']?.file || manifest['resources/js/app.css']?.file || 'assets/app.css';
const jsFile = manifest['resources/js/app.js']?.file || 'assets/app.js';

function resolveComponent(name) {
    return readFile(path.join(COMPONENTS, `${name}.blade.php`));
}

function renderBlade(template, options = {}) {
    let html = template;

    html = html.replace(/\{\{\s*authUser\.(\w+)\s*\}\}/g, (_, key) => {
        if (key === 'initials' && options.authUser?.name) return options.authUser.name.charAt(0).toUpperCase();
        if (options.authUser && options.authUser[key] !== undefined) {
            const v = options.authUser[key];
            return typeof v === 'string' ? v : JSON.stringify(v);
        }
        return '';
    });

    html = html.replace(/\{\{\s*(\w[\w.]*)\s*\}\}/g, (_, expr) => {
        if (expr.startsWith('authUser')) return '';
        if (options[expr] !== undefined) return String(options[expr]);
        return `{{${expr}}}`;
    });

    html = html.replace(/\{\{\s*(.+?)\s*\}\}/g, (_, expr) => {
        if (['__', '$', 'session', 'errors', 'old'].some(s => expr.includes(s))) return '';
        return `{{${expr}}}`;
    });

    const cssContent = readFile(path.join(PUBLIC, 'build', cssFile)) || '';
    const jsContent = (readFile(path.join(PUBLIC, 'build', jsFile)) || '').replace(/kn\.start\(\);?\s*$/, '');
    html = html.replace(/@vite\(\s*\[(.+?)\]\s*\)/g, () =>
        `<style>${cssContent}</style><script>${jsContent}<\/script>`);

    html = html.replace(/@csrf/g, '');
    html = html.replace(/@method\('([^']+)'\)/g, '');
    html = html.replace(/@push\('([^']+)'\)([\s\S]*?)@endpush/g, '');
    html = html.replace(/@stack\('([^']+)'\)/g, '');

    html = html.replace(/@auth([\s\S]*?)@endauth/g, (_, c) => options.authUser ? c : '');
    html = html.replace(/@guest([\s\S]*?)@endguest/g, (_, c) => !options.authUser ? c : '');

    html = html.replace(/@section\('([^']+)',\s*'([^']*)'\)/g, (_, n, v) => v);
    html = html.replace(/@section\('([^']+)'\)([\s\S]*?)@endsection/g, (_, n, c) => c);

    html = html.replace(/@yield\('([^']+)'(?:\s*,\s*'([^']*)')?\)/g, (_, name, defaultVal) => {
        if (name === 'title') return options.title || defaultVal || 'नयी पहल';
        if (name === 'meta_description') return options.meta_description || defaultVal || 'Premium matrimonial platform for second marriage';
        if (name === 'content') {
            const view = readFile(path.join(VIEWS, options.view || 'home.blade.php'));
            if (!view) return '';
            let c = view;
            c = c.replace(/@extends\('layouts\.(?:app|dashboard)'\)/g, '');
            c = c.replace(/@section\('([^']+)',\s*'[^']*'\)/g, '');
            c = c.replace(/@section\('content'\)([\s\S]*?)@endsection/g, (_, x) => x);
            c = c.replace(/@push\('head'\)[\s\S]*?@endpush/g, '');
            c = c.replace(/@stack\('head'\)/g, '');
            return renderBlade(c, options);
        }
        return '';
    });

    html = html.replace(/@extends\('([^']+)'\)/g, '');

    html = html.replace(/<x-([a-z-]+)\s*\/?>/g, (_, name) => {
        const comp = resolveComponent(name);
        return comp ? renderBlade(comp, options) : `<!-- component:${name} not found -->`;
    });

    html = html.replace(/\{\{--[\s\S]*?--\}\}/g, '');
    html = html.replace(/@lang\('([^']+)'\)/g, (_, k) => k);
    html = html.replace(/@error\('([^']+)'\)([\s\S]*?)@enderror/g, '');

    if (options.flash?.success) {
        html = html.replace('<main>', `<main><div class="max-w-6xl mx-auto px-4 pt-20"><div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm flex items-center gap-2"><i class="fas fa-check-circle"></i>${options.flash.success}</div></div>`);
    } else if (options.flash?.error) {
        html = html.replace('<main>', `<main><div class="max-w-6xl mx-auto px-4 pt-20"><div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm flex items-center gap-2"><i class="fas fa-exclamation-circle"></i>${options.flash.error}</div></div>`);
    }

    return html + '<script>kn.start()<\/script>';
}

function extractSections(vc) {
    const s = {};
    for (const m of vc.matchAll(/@section\('([^']+)',\s*'([^']*)'\)/g)) s[m[1]] = m[2];
    for (const m of vc.matchAll(/@section\('([^']+)'\)([\s\S]*?)@endsection/g)) s[m[1]] = m[2].trim();
    return s;
}

function renderPage(viewName, title, authUser, flash = {}) {
    const layout = readFile(path.join(VIEWS, 'layouts', 'app.blade.php'));
    if (!layout) return null;
    const view = readFile(path.join(VIEWS, viewName)) || '';
    const sec = extractSections(view);
    return renderBlade(layout, { view: viewName, title: sec.title || title, authUser, flash });
}

function renderDashboard(viewName, title, authUser, activeMenu, flash = {}, extra = {}) {
    const layout = readFile(path.join(VIEWS, 'layouts', 'dashboard.blade.php'));
    if (!layout) return null;
    const view = readFile(path.join(VIEWS, viewName)) || '';
    const sec = extractSections(view);
    return renderBlade(layout, { view: viewName, title: sec.title || title, authUser, flash, activeMenu, ...flash, ...extra });
}

function html(res, html) { res.writeHead(200, { 'Content-Type': 'text/html' }); res.end(html); }

function redirect(res, loc, flash = {}) {
    const p = new URLSearchParams();
    if (flash.error) p.set('error', flash.error);
    if (flash.success) p.set('success', flash.success);
    const qs = p.toString();
    res.writeHead(302, { Location: loc + (qs ? '?' + qs : '') });
    res.end();
}

function setSessionCookie(res, userId) {
    const value = userId + ':' + Date.now();
    res.setHeader('Set-Cookie', `session=${signCookie(value)}; HttpOnly; Path=/; Max-Age=${SESSION_TTL / 1000}`);
}

function parseBody(req) {
    return new Promise(resolve => {
        let body = '';
        req.on('data', c => body += c);
        req.on('end', () => resolve(new URLSearchParams(body)));
    });
}

const SAMPLE_PROFILES = [
    { id: 'p1', name: 'Neha Sharma', age: 38, city: 'Mumbai', occupation: 'Chartered Accountant', image: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=300&q=80', bio: 'Independent woman looking for a caring partner who respects my past and wants to build a future.' },
    { id: 'p2', name: 'Rajesh Verma', age: 42, city: 'Delhi', occupation: 'Business Owner', image: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&q=80', bio: 'Widower with a daughter. Looking for a loving companion to share life with.' },
    { id: 'p3', name: 'Ananya Gupta', age: 35, city: 'Bengaluru', occupation: 'Software Engineer', image: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=300&q=80', bio: 'Divorcee seeking a second chance at love. I believe everyone deserves happiness.' },
    { id: 'p4', name: 'Vikram Singh', age: 45, city: 'Pune', occupation: 'Architect', image: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=300&q=80', bio: 'Simple, honest man looking for a genuine connection. Love traveling and photography.' },
    { id: 'p5', name: 'Priya Patel', age: 40, city: 'Ahmedabad', occupation: 'Teacher', image: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=300&q=80', bio: 'Widow with a son. Looking for a kind hearted person to complete my family.' },
    { id: 'p6', name: 'Arun Nair', age: 39, city: 'Chennai', occupation: 'Bank Manager', image: 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=300&q=80', bio: 'Divorced, no kids. Looking for a life partner who values trust and companionship.' },
];

async function handlePost(req, res) {
    const params = await parseBody(req);
    const url = req.url;
    const authUser = await getSessionUser(req.headers.cookie);

    if (url === '/login') {
        const email = params.get('email') || '';
        const password = params.get('password') || '';
        const user = await findUserByEmail(email);
        if (!user || !verifyPassword(password, user.password)) {
            return redirect(res, '/login', { error: 'Invalid email or password.' });
        }
        setSessionCookie(res, user.id);
        return redirect(res, '/', { success: 'Welcome back, ' + user.name + '!' });
    }

    if (url === '/register') {
        const name = (params.get('name') || '').trim();
        const email = (params.get('email') || '').trim();
        const phone = (params.get('phone') || '').trim();
        const gender = params.get('gender') || '';
        const password = params.get('password') || '';
        const confirmation = params.get('password_confirmation');

        let error;
        if (!name) error = 'Full name is required.';
        else if (!email) error = 'Email address is required.';
        else if (!phone) error = 'Phone number is required.';
        else if (!gender) error = 'Please select your gender.';
        else if (!password) error = 'Password is required.';
        else if (password.length < 6) error = 'Password must be at least 6 characters.';
        else if (confirmation && password !== confirmation) error = 'Passwords do not match.';
        else {
            const existing = await findUserByEmail(email);
            if (existing) error = 'An account with this email already exists.';
        }

        if (error) return redirect(res, '/register', { error });

        const userCount = await getUserCount();
        const role = userCount === 0 ? 'admin' : 'user';
        const id = crypto.randomUUID();
        await insertUser({
            id, name, email, phone, gender,
            password: hashPassword(password),
            bio: '', age: '', city: '', occupation: '',
            role,
            createdAt: new Date().toISOString(),
        });
        setSessionCookie(res, id);
        return redirect(res, '/', { success: 'Welcome to नयी पहल, ' + name + '!' });
    }

    if (url === '/logout') {
        res.writeHead(302, { Location: '/', 'Set-Cookie': 'session=; HttpOnly; Path=/; Max-Age=0' });
        return res.end();
    }

    if (url === '/dashboard/profile') {
        if (!authUser) return redirect(res, '/login', { error: 'Please login first' });
        const fields = {};
        if (params.get('name')) fields.name = params.get('name');
        if (params.get('email')) fields.email = params.get('email');
        if (params.get('phone')) fields.phone = params.get('phone');
        fields.bio = params.get('bio') || '';
        fields.age = params.get('age') || '';
        fields.city = params.get('city') || '';
        fields.occupation = params.get('occupation') || '';
        await updateUser(authUser.id, fields);
        return redirect(res, '/dashboard/profile', { success: 'Profile updated successfully!' });
    }

    if (url === '/dashboard/save-profile') {
        if (!authUser) return redirect(res, '/login', { error: 'Please login first' });
        const profileId = params.get('profile_id');
        const saved = await toggleSavedProfile(authUser.id, profileId);
        return redirect(res, '/dashboard/matches', { success: saved ? 'Profile saved!' : 'Profile removed from saved' });
    }

    if (url === '/dashboard/update-password') {
        if (!authUser) return redirect(res, '/login', { error: 'Please login first' });
        const current = params.get('current_password') || '';
        const newPw = params.get('new_password') || '';
        const confirmPw = params.get('confirm_password') || '';
        const user = await getUser(authUser.id);
        if (!user || !verifyPassword(current, user.password)) {
            return redirect(res, '/dashboard/profile', { error: 'Current password is incorrect.' });
        }
        if (newPw.length < 6) return redirect(res, '/dashboard/profile', { error: 'New password must be at least 6 characters.' });
        if (newPw !== confirmPw) return redirect(res, '/dashboard/profile', { error: 'Passwords do not match.' });
        await updateUserPassword(authUser.id, hashPassword(newPw));
        return redirect(res, '/dashboard/profile', { success: 'Password updated successfully!' });
    }

    if (url === '/admin/update-role') {
        if (!authUser || authUser.role !== 'admin') return redirect(res, '/', { error: 'Access denied' });
        await updateUser(params.get('user_id'), { role: params.get('role') });
        return redirect(res, '/admin/users', { success: 'User role updated!' });
    }

    if (url === '/admin/delete-user') {
        if (!authUser || authUser.role !== 'admin') return redirect(res, '/', { error: 'Access denied' });
        const targetId = params.get('user_id');
        if (targetId !== authUser.id) {
            const db = getDb();
            await db.execute({ sql: 'DELETE FROM users WHERE id = ?', args: [targetId] });
        }
        return redirect(res, '/admin/users', { success: 'User removed!' });
    }

    if (url === '/admin/review-action') {
        if (!authUser || authUser.role !== 'admin') return redirect(res, '/', { error: 'Access denied' });
        const reviewId = params.get('review_id');
        const action = params.get('action');
        if (action === 'approve') await updateReview(reviewId, { approved: 1 });
        else if (action === 'delete') await deleteReview(reviewId);
        return redirect(res, '/admin/reviews', { success: 'Review updated!' });
    }

    res.writeHead(404);
    res.end('Not found');
}

async function handler(req, res) {
    if (req.method === 'POST') return handlePost(req, res);

    let url = req.url.split('?')[0];
    const authUser = await getSessionUser(req.headers.cookie);
    const urlP = new URLSearchParams(req.url.split('?')[1] || '');
    const flash = { error: urlP.get('error') || '', success: urlP.get('success') || '' };

    if (url === '/logout') {
        res.writeHead(302, { Location: '/', 'Set-Cookie': 'session=; HttpOnly; Path=/; Max-Age=0' });
        return res.end();
    }

    const ROUTES = {
        '/': { view: 'home.blade.php', title: 'नयी पहल - Find Love Again' },
        '/login': { view: 'auth/login.blade.php', title: 'Login - नयी पहल' },
        '/register': { view: 'auth/register.blade.php', title: 'Register - नयी पहल' },
    };

    if (ROUTES[url]) {
        const route = ROUTES[url];
        const h = renderPage(route.view, route.title, authUser, flash);
        if (h) return html(res, h);
        res.writeHead(500); return res.end('Render error');
    }

    if (url.startsWith('/dashboard')) {
        if (!authUser) return redirect(res, '/login', { error: 'Please login first' });

        if (url === '/dashboard') {
            const users = await getUsers();
            const saved = await getSavedProfiles(authUser.id);
            const h = renderDashboard('dashboard/index.blade.php', 'Dashboard - नयी पहल', authUser, 'dashboard', flash, {
                totalMembers: users.length, savedCount: saved.length, matchCount: SAMPLE_PROFILES.length,
            });
            if (h) return html(res, h);
        }

        if (url === '/dashboard/profile') {
            const u = await getUser(authUser.id);
            const h = renderDashboard('dashboard/profile.blade.php', 'My Profile - नयी पहल', u || authUser, 'profile', flash);
            if (h) return html(res, h);
        }

        if (url === '/dashboard/matches') {
            const saved = await getSavedProfiles(authUser.id);
            const profiles = SAMPLE_PROFILES.map(p => ({ ...p, saved: saved.includes(p.id) }));
            const h = renderDashboard('dashboard/matches.blade.php', 'Match Suggestions - नयी पहल', authUser, 'matches', flash, {
                profilesJson: JSON.stringify(profiles),
            });
            if (h) return html(res, h);
        }

        if (url === '/dashboard/saved') {
            const saved = await getSavedProfiles(authUser.id);
            const profiles = SAMPLE_PROFILES.filter(p => saved.includes(p.id));
            const h = renderDashboard('dashboard/saved.blade.php', 'Saved Profiles - नयी पहल', authUser, 'saved', flash, {
                savedProfilesJson: JSON.stringify(profiles), savedCount: profiles.length,
            });
            if (h) return html(res, h);
        }

        return redirect(res, '/dashboard');
    }

    if (url.startsWith('/admin')) {
        if (!authUser || authUser.role !== 'admin') return redirect(res, '/', { error: 'Access denied' });

        if (url === '/admin') {
            const users = await getUsers();
            const reviews = await getReviews();
            const pending = reviews.filter(r => !r.approved).length;
            const h = renderDashboard('admin/index.blade.php', 'Admin - नयी पहल', authUser, 'admin', flash, {
                totalUsers: users.length, pendingReviews: pending, matchCount: SAMPLE_PROFILES.length,
            });
            if (h) return html(res, h);
        }

        if (url === '/admin/users') {
            const users = await getUsers();
            const h = renderDashboard('admin/users.blade.php', 'Manage Users - नयी पहल', authUser, 'admin-users', flash, {
                usersJson: JSON.stringify(users.map(u => ({ ...u, password: undefined }))),
            });
            if (h) return html(res, h);
        }

        if (url === '/admin/reviews') {
            const reviews = await getReviews();
            const h = renderDashboard('admin/reviews.blade.php', 'Reviews - नयी पहल', authUser, 'admin-reviews', flash, {
                reviewsJson: JSON.stringify(reviews),
            });
            if (h) return html(res, h);
        }

        return redirect(res, '/admin');
    }

    let filePath = path.join(PUBLIC, url);
    if (fs.existsSync(filePath) && fs.statSync(filePath).isFile()) {
        const ext = path.extname(filePath);
        res.writeHead(200, { 'Content-Type': MIME[ext] || 'application/octet-stream' });
        return res.end(fs.readFileSync(filePath));
    }

    res.writeHead(404);
    res.end('Not found');
}

if (process.env.VERCEL !== '1') {
    const PORT = process.env.PORT || 3000;
    http.createServer(handler).listen(PORT, () => {
        console.log(`Server running at http://localhost:${PORT}`);
    });
}

export default handler;
