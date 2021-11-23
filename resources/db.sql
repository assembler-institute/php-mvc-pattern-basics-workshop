DROP DATABASE IF EXISTS mvc_basics_pill;
CREATE DATABASE IF NOT EXISTS mvc_basics_pill;
USE mvc_basics_pill;

-- Creation of the tables
CREATE TABLE users(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
last_name VARCHAR(50),
email VARCHAR(50) UNIQUE,
age VARCHAR(3) NOT NULL,
avatar VARCHAR(200)
);

CREATE TABLE subjects(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
subjects_name VARCHAR(50) NOT NULL
);

CREATE TABLE anotations(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
anotations_user_id INT NOT NULL,
subjects_id INT NOT NULL,
title VARCHAR(50),
grades DECIMAL(6,2),
date DATE,  
FOREIGN KEY (post_user_id) REFERENCES users(id), 
FOREIGN KEY (subjects_id) REFERENCES subjects(id) 
);

-- Insert of data
INSERT INTO users (name, last_name, email, age, avatar)
VALUES 
("Rack", "Lei", "jackon@network.com", 21, "https://pbs.twimg.com/profile_images/587511475440332800/_Y3Wl3PL.jpg"),
("John", "Doe", "jhondoe@foo.com", 22, "https://pbs.twimg.com/profile_images/1094979667143069696/QrD0ovrh.jpg"),
("Leila", "Mills", "mills@leila.com", 23, "https://m.media-amazon.com/images/M/MV5BMzI5NDIzNTQ1Nl5BMl5BanBnXkFtZTgwMjQ0Mzc1MTE@._V1_UY256_CR4,0,172,256_AL_.jpg");

INSERT INTO subjects (subjects_name)
VALUES ("Maths");


INSERT INTO anotations (anotations_user_id,subjects_id,title,grades,date)
VALUES (1,1, "Surprise Exam",4.9, "2021-11-11");

CREATE TABLE anotations(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
post_user_id INT NOT NULL,
subjects_id INT NOT NULL,
title VARCHAR(50),
grades DECIMAL(6,2),
date DATE,  
FOREIGN KEY (post_user_id) REFERENCES users(id), 
FOREIGN KEY (subjects_id) REFERENCES subjects(id) 
);