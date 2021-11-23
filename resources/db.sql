DROP DATABASE IF EXISTS mvc_basics_pill;
CREATE DATABASE IF NOT EXISTS mvc_basics_pill;
USE mvc_basics_pill;


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
FOREIGN KEY (anotations_user_id) REFERENCES users(id), 
FOREIGN KEY (subjects_id) REFERENCES subjects(id) 
);


INSERT INTO users (name, last_name, email, age, avatar)
VALUES 
("Rack", "Lei", "jackon1@network.com", 21, "https://pbs.twimg.com/profile_images/587511475440332800/_Y3Wl3PL.jpg"),
("John", "Doe", "jhondoe6@foo.com", 22, "https://pbs.twimg.com/profile_images/1094979667143069696/QrD0ovrh.jpg"),
("Leilu", "Mills", "mills@leila.com", 23, "https://pbs.twimg.com/profile_images/1094979667143069696/QrD0ovrh.jpg"),
("Reck", "Lei", "jackon2@network.com", 24, "https://pbs.twimg.com/profile_images/587511475440332800/_Y3Wl3PL.jpg"),
("Jouhn", "Doe", "jhondoe7@foo.com", 25, "https://pbs.twimg.com/profile_images/1094979667143069696/QrD0ovrh.jpg"),
("Leilo", "Mills", "mills8@leila.com", 23, "https://pbs.twimg.com/profile_images/1094979667143069696/QrD0ovrh.jpg"),
("Rick", "Lei", "jackon3@network.com", 21, "https://pbs.twimg.com/profile_images/587511475440332800/_Y3Wl3PL.jpg"),
("Joihn", "Doe", "jhondoe9@foo.com", 22, "https://pbs.twimg.com/profile_images/1094979667143069696/QrD0ovrh.jpg"),
("Leili", "Mills", "milsls11@leila.com", 23, "https://pbs.twimg.com/profile_images/1094979667143069696/QrD0ovrh.jpg"),
("Rock", "Lei", "jackon4@network.com", 25, "https://pbs.twimg.com/profile_images/587511475440332800/_Y3Wl3PL.jpg"),
("Joehn", "Doe", "jhondoe12@foo.com", 22, "https://pbs.twimg.com/profile_images/1094979667143069696/QrD0ovrh.jpg"),
("Leile", "Mills", "mills13@leila.com", 29, "https://pbs.twimg.com/profile_images/1094979667143069696/QrD0ovrh.jpg"),
("Ruck", "Lei", "jackon5@network.com", 28, "https://pbs.twimg.com/profile_images/587511475440332800/_Y3Wl3PL.jpg"),
("Joahn", "Doe", "jhondoe14@foo.com", 22, "https://pbs.twimg.com/profile_images/1094979667143069696/QrD0ovrh.jpg"),
("Leila", "Mills", "mills21@leila.com", 29, "https://pbs.twimg.com/profile_images/1094979667143069696/QrD0ovrh.jpg");

INSERT INTO subjects (subjects_name)
VALUES ("POO"),("SQL"),("JavaScript"),("jQuery"),("HTML"),("CSS");


INSERT INTO anotations (anotations_user_id,subjects_id,title,grades,date)
VALUES 
(1,1, "Exam 1",10, "2021-11-11"),
(1,2, "Exam 2",9.1, "2021-11-12"),
(1,3, "Exam 3",8.2, "2021-11-13"),
(1,4, "Exam 4",7.3, "2021-11-14"),
(1,5, "Exam 5",6.4, "2021-11-15"),
(2,1, "Exam 1",5.5, "2021-11-11"),
(2,2, "Exam 2",4.6, "2021-11-12"),
(2,3, "Exam 3",3.7, "2021-11-13"),
(2,4, "Exam 4",2.8, "2021-11-14"),
(2,5, "Exam 5",1.9, "2021-11-15"),
(3,1, "Exam 1",9, "2021-11-11"),
(3,2, "Exam 2",9.12, "2021-11-12"),
(3,3, "Exam 3",8.25, "2021-11-13"),
(3,4, "Exam 4",7.34, "2021-11-14"),
(3,5, "Exam 5",6.44, "2021-11-15"),
(4,1, "Exam 1",5.19, "2021-11-11"),
(4,2, "Exam 2",4.29, "2021-11-12"),
(4,3, "Exam 3",3.39, "2021-11-13"),
(4,4, "Exam 4",2.49, "2021-11-14"),
(4,5, "Exam 5",1.59, "2021-11-15"),
(5,1, "Exam 1",0.99, "2021-11-11"),
(5,2, "Exam 2",9.19, "2021-11-12"),
(5,3, "Exam 3",8.29, "2021-11-13"),
(5,4, "Exam 4",7.39, "2021-11-14"),
(5,5, "Exam 5",6.49, "2021-11-15"),
(6,1, "Exam 1",5.59, "2021-11-11"),
(6,2, "Exam 2",4.96, "2021-11-12"),
(6,3, "Exam 3",3.79, "2021-11-13"),
(6,4, "Exam 4",2.89, "2021-11-14"),
(6,5, "Exam 5",1.99, "2021-11-15"),
(7,1, "Exam 1",6.9, "2021-11-11"),
(7,2, "Exam 2",9.91, "2021-11-12"),
(7,3, "Exam 3",8.97, "2021-11-13"),
(7,4, "Exam 4",7.92, "2021-11-14"),
(7,5, "Exam 5",6.39, "2021-11-15"),
(8,1, "Exam 1",5.49, "2021-11-11"),
(8,2, "Exam 2",4.95, "2021-11-12"),
(8,3, "Exam 3",3.59, "2021-11-13"),
(8,4, "Exam 4",2.69, "2021-11-14"),
(8,5, "Exam 5",1.96, "2021-11-15")
;

