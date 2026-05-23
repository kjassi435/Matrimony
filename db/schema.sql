CREATE TABLE IF NOT EXISTS users (
    id TEXT PRIMARY KEY,
    name TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL,
    phone TEXT,
    gender TEXT,
    password TEXT NOT NULL,
    bio TEXT DEFAULT '',
    age TEXT DEFAULT '',
    city TEXT DEFAULT '',
    occupation TEXT DEFAULT '',
    role TEXT DEFAULT 'user',
    created_at TEXT DEFAULT (datetime('now'))
);

CREATE TABLE IF NOT EXISTS saved_profiles (
    user_id TEXT NOT NULL,
    profile_id TEXT NOT NULL,
    created_at TEXT DEFAULT (datetime('now')),
    PRIMARY KEY (user_id, profile_id)
);

CREATE TABLE IF NOT EXISTS reviews (
    id TEXT PRIMARY KEY,
    name TEXT,
    text TEXT,
    approved INTEGER DEFAULT 0,
    created_at TEXT DEFAULT (datetime('now'))
);
