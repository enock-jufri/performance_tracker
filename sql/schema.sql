-- 1. Create and select the database
CREATE DATABASE IF NOT EXISTS judge_portal;
USE judge_portal;

-- 2. Drop existing tables
DROP TABLE IF EXISTS scores;
DROP TABLE IF EXISTS participants;
DROP TABLE IF EXISTS users;

-- 3. Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    display_name VARCHAR(100) NOT NULL,
    role ENUM('admin', 'judge') NOT NULL
);

-- 4. Participants table
CREATE TABLE participants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    display_name VARCHAR(100) NOT NULL
);

-- 5. Scores table
CREATE TABLE scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judge_id INT NOT NULL,
    participant_id INT NOT NULL,
    points INT NOT NULL CHECK (points BETWEEN 0 AND 100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (judge_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (participant_id) REFERENCES participants(id) ON DELETE CASCADE
);

-- Insert users (admin + 4 judges)
INSERT INTO users (username, password, display_name, role) VALUES
('admin1',  '$2y$10$yrIx3F0fF72xVFXJjFxXJ.0XvIB7rGLbp5QD6mkTm5n6nrdB5mm0O', 'Morgan',     'admin'),
('judge1',  '$2y$10$yrIx3F0fF72xVFXJjFxXJ.0XvIB7rGLbp5QD6mkTm5n6nrdB5mm0O', 'Alice',      'judge'),
('judge2',  '$2y$10$yrIx3F0fF72xVFXJjFxXJ.0XvIB7rGLbp5QD6mkTm5n6nrdB5mm0O', 'Bob',        'judge'),
('judge3',  '$2y$10$yrIx3F0fF72xVFXJjFxXJ.0XvIB7rGLbp5QD6mkTm5n6nrdB5mm0O', 'Lenny',      'judge'),
('judge4',  '$2y$10$yrIx3F0fF72xVFXJjFxXJ.0XvIB7rGLbp5QD6mkTm5n6nrdB5mm0O', 'Carol',      'judge');

-- Insert participants
INSERT INTO participants (username, display_name) VALUES
('jdoe',       'John Doe'),
('asmith',     'Alice Smith'),
('bwayne',     'Bruce Wayne'),
('ckent',      'Clark Kent'),
('dprince',    'Diana Prince'),
('pparker',    'Peter Parker'),
('tstark',     'Tony Stark'),
('nsummers',   'Nathan Summers'),
('hpotter',    'Harry Potter'),
('lskywalker', 'Luke Skywalker');

-- Scores from Judge1 (id = 2)
INSERT INTO scores (judge_id, participant_id, points) VALUES
(2, 1, 85),
(2, 2, 90),
(2, 3, 78),
(2, 4, 88),
(2, 5, 80),
(2, 6, 89),
(2, 7, 75),
(2, 8, 83),
(2, 9, 86),
(2, 10, 90);

-- Scores from Judge2 (id = 3)
INSERT INTO scores (judge_id, participant_id, points) VALUES
(3, 1, 80),
(3, 2, 92),
(3, 3, 75),
(3, 4, 86),
(3, 5, 78),
(3, 6, 84),
(3, 7, 79),
(3, 8, 85),
(3, 9, 88),
(3, 10, 87);

-- Scores from Admin (id = 1)
INSERT INTO scores (judge_id, participant_id, points) VALUES
(1, 1, 82),
(1, 2, 88),
(1, 3, 80),
(1, 4, 90),
(1, 5, 82),
(1, 6, 86),
(1, 7, 91),
(1, 8, 80),
(1, 9, 84),
(1, 10, 85);

-- Scores from Judge3 (id = 4)
INSERT INTO scores (judge_id, participant_id, points) VALUES
(4, 5, 86),
(4, 6, 91),
(4, 7, 83),
(4, 8, 77),
(4, 9, 89),
(4, 10, 90);

-- Scores from Judge4 (id = 5)
INSERT INTO scores (judge_id, participant_id, points) VALUES
(5, 5, 88),
(5, 6, 85),
(5, 7, 90),
(5, 8, 82),
(5, 9, 87),
(5, 10, 84);
