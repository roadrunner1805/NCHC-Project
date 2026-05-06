-- Drop existing user and database safely
DROP USER IF EXISTS 'joe' @'localhost';

DROP USER IF EXISTS 'joe' @'%';

DROP DATABASE IF EXISTS `INFS3800Project`;

-- Create the database
CREATE DATABASE `INFS3800Project`;

USE `INFS3800Project`;

-- Create user 'joe'
CREATE USER 'joe' @'localhost' IDENTIFIED BY 'joe123';

-- Grant privileges
GRANT ALL PRIVILEGES ON `INFS3800Project`.* TO 'joe' @'localhost';

FLUSH PRIVILEGES;

-- USERS TABLE
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO
    users (username, password)
VALUES ('jma', 'jma123')
ON DUPLICATE KEY UPDATE
    username = username;

-- PLAYERS TABLE
DROP TABLE IF EXISTS players;

CREATE TABLE players (
    player_id INT AUTO_INCREMENT PRIMARY KEY,
    player_name VARCHAR(100) NOT NULL,
    team VARCHAR(50) NOT NULL,
    position VARCHAR(10),
    gp INT DEFAULT 0,
    goals INT DEFAULT 0,
    assists INT DEFAULT 0,
    points INT DEFAULT 0,
    plus_minus INT DEFAULT 0
);

INSERT INTO
    players (
        player_name,
        team,
        position,
        gp,
        goals,
        assists,
        points,
        plus_minus
    )
VALUES (
        'Jackson Blake',
        'North Dakota',
        'F',
        40,
        22,
        38,
        60,
        25
    ),
    (
        'Jack Devine',
        'Denver',
        'F',
        44,
        27,
        29,
        56,
        31
    ),
    (
        'Zeev Buium',
        'Denver',
        'D',
        42,
        11,
        39,
        50,
        33
    ),
    (
        'Luke Grainger',
        'Western Michigan',
        'F',
        38,
        14,
        34,
        48,
        12
    ),
    (
        'Massimo Rizzo',
        'Denver',
        'F',
        30,
        10,
        34,
        44,
        24
    ),
    (
        'Noah Laba',
        'Colorado College',
        'F',
        36,
        20,
        17,
        37,
        18
    ),
    (
        'Sam Colangelo',
        'Western Michigan',
        'F',
        38,
        24,
        19,
        43,
        19
    ),
    (
        'Ben Steeves',
        'Minnesota Duluth',
        'F',
        37,
        24,
        10,
        34,
        1
    ),
    (
        'Cameron Berg',
        'St. Cloud State',
        'F',
        38,
        20,
        17,
        37,
        5
    ),
    (
        'Riese Gaber',
        'North Dakota',
        'F',
        40,
        18,
        16,
        34,
        -2
    ),
    (
        'Dylan Anhorn',
        'St. Cloud State',
        'D',
        38,
        6,
        27,
        33,
        14
    ),
    (
        'Gleb Veremyev',
        'Colorado College',
        'F',
        37,
        15,
        13,
        28,
        4
    ),
    (
        'Joe Miller',
        'Harvard',
        'F',
        32,
        13,
        14,
        27,
        -5
    ),
    (
        'Miko Matikka',
        'Denver',
        'F',
        43,
        20,
        13,
        33,
        15
    ),
    (
        'Simon Latkoczy',
        'Omaha',
        'G',
        34,
        0,
        0,
        0,
        0
    );