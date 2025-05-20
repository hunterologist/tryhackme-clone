-- File: source/db.sql
CREATE DATABASE IF NOT EXISTS sqli_challenge;
USE sqli_challenge;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
);

INSERT INTO users (username, password) VALUES
('admin', 'admin123'),
('user', 'pass');
