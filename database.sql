CREATE DATABASE tracking_db;

USE tracking_db;

CREATE TABLE devices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip VARCHAR(45),
    country VARCHAR(100),
    region VARCHAR(100),
    city VARCHAR(100),
    isp VARCHAR(255),
    user_agent TEXT,
    screen_width INT,
    screen_height INT,
    viewport_width INT,
    viewport_height INT,
    language VARCHAR(10),
    platform VARCHAR(100),
    cookies_enabled BOOLEAN,
    timezone VARCHAR(100),
    brand VARCHAR(100),
    model VARCHAR(255),
    is_bot BOOLEAN,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);