CREATE DATABASE IF NOT EXISTS renderapp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE USER 'invitado'@'%' IDENTIFIED BY '4aabcdE1f3A';
GRANT ALL PRIVILEGES ON renderapp.* TO 'invitado'@'%';

FLUSH PRIVILEGES;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    lastname VARCHAR(100),
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (name, lastname, email, password) VALUES ('invitado', '', 'invitado@example.com', 'L3wC7krx4yQ/ey/');