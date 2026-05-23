import { createClient } from '@libsql/client';
import { readFileSync } from 'fs';

const url = process.env.TURSO_DB_URL;
const authToken = process.env.TURSO_AUTH_TOKEN;

if (!url || !authToken) {
    console.error('Missing TURSO_DB_URL or TURSO_AUTH_TOKEN environment variables.');
    console.error('Create a .env file with:');
    console.error('  TURSO_DB_URL=libsql://your-db.turso.io');
    console.error('  TURSO_AUTH_TOKEN=your-token');
    process.exit(1);
}

const db = createClient({ url, authToken });

const schema = readFileSync(new URL('../db/schema.sql', import.meta.url), 'utf-8');

const statements = schema
    .split(';')
    .map(s => s.trim())
    .filter(s => s.length > 0);

for (const stmt of statements) {
    try {
        await db.execute(stmt + ';');
        console.log('Ran:', stmt.slice(0, 60) + '...');
    } catch (err) {
        console.error('Error running:', stmt.slice(0, 60), err.message);
    }
}

console.log('Database initialization complete!');
