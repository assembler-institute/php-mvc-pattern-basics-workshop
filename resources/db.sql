DROP DATABASE IF EXISTS mvc_master;
CREATE DATABASE IF NOT EXISTS mvc_master;
USE mvc_master;

CREATE TABLE employees (
    employeeId int NOT NULL AUTO_INCREMENT,
    firstName varchar(255) NOT NULL,
    lastName varchar(255),
    age int,
    PRIMARY KEY (employeeId)
);
INSERT INTO employees (firstName,lastName, age)
VALUES ('Antonio','Copete', 29),
('Raul','Gomez', 19),('Sandra','Lopez', 24),('Eva','Rodriguez', 35);


CREATE TABLE offices (
    officeId int NOT NULL AUTO_INCREMENT,
    city varchar(255) NOT NULL,
    country varchar(255),
    address varchar(255),
    PRIMARY KEY (officeId)
);
INSERT INTO offices (city,country, address)
VALUES ('Sevilla','Spain', 'C/Real, 15'),
('Hamburg','Germany', 'Berlinstrasse, 12'),('Dublin','Ireland', 'Groove Street, 14');


