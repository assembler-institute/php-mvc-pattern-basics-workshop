DROP DATABASE IF EXISTS mvc_basics_pill;
CREATE DATABASE IF NOT EXISTS mvc_basics_pill;
USE mvc_basics_pill;

-- Creation of the tables
CREATE TABLE users(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
last_name VARCHAR(50),
email VARCHAR(50) UNIQUE,
password VARCHAR(50) NOT NULL,
avatar VARCHAR(200)
);

CREATE TABLE categories(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
category_name VARCHAR(50) NOT NULL
);

CREATE TABLE posts(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
post_user_id INT NOT NULL,
category_id INT NOT NULL,
title VARCHAR(50),
description TEXT(1000),
date DATE, 
time TIME,  
FOREIGN KEY (post_user_id) REFERENCES users(id), 
FOREIGN KEY (category_id) REFERENCES categories(id) 
);

-- Insert of data
INSERT INTO users (name, last_name, email, password, avatar)
VALUES 
("Rack", "Lei", "jackon@network.com", "123456789", "https://pbs.twimg.com/profile_images/587511475440332800/_Y3Wl3PL.jpg"),
("John", "Doe", "jhondoe@foo.com", "123456789", "https://pbs.twimg.com/profile_images/1094979667143069696/QrD0ovrh.jpg"),
("Leila", "Mills", "mills@leila.com", "123456789", "https://m.media-amazon.com/images/M/MV5BMzI5NDIzNTQ1Nl5BMl5BanBnXkFtZTgwMjQ0Mzc1MTE@._V1_UY256_CR4,0,172,256_AL_.jpg");

INSERT INTO categories (category_name)
VALUES ("Example Category");


INSERT INTO posts (post_user_id,category_id,title,description,date,time)
VALUES (1,1, "Example Title","Lorem ipsum dolor sit amet, consectetur adipiscing elit...", "2021-11-11", "13:23:44");