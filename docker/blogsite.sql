USE blogsite;
CREATE TABLE IF NOT EXISTS entries (
    `id` INTEGER NOT NULL  AUTO_INCREMENT PRIMARY KEY,
    `subject` TEXT,
    `body` TEXT );
CREATE TABLE IF NOT EXISTS drafts (
    `id` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `subject` TEXT,
    `body` TEXT );
INSERT INTO drafts VALUES( NULL, 'My First Post','My First Post Body');