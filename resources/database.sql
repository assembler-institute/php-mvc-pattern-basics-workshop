DROP DATABASE IF EXISTS mvc_pattern_basics;
CREATE DATABASE IF NOT EXISTS mvc_pattern_basics;

USE mvc_pattern_basics;

/* CREATE TABLES */
CREATE TABLE employees (
    emp_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NUll,
    gender ENUM('M', 'F') NOT NULL,
    age INT(2) NOT NULL
);

CREATE TABLE movies (
    movie_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    movie_name VARCHAR(100) NOT NULL,
    released_year INT(4) NOT NULL,
    runtime INT(3) NOT NULL
);

/* INSERT DATA */
INSERT INTO employees (first_name, last_name, gender, age)
VALUES 
('Brandon', 'Parry', 'M', 27),
('William', 'Thomas', 'M', 30),
('Betty', 'Roberts', 'F', 28),
('Cathy', 'Willcox', 'F', 31),
('Alan', 'Young', 'M', 37),
('Jenifer', 'Dizon', 'F', 25),
('Melissa', 'Stone', 'F', 32),
('John', 'Copeland', 'M', 41),
('David', 'Morgan', 'M', 37),
('Carole', 'Parker', 'F', 39),
('Henry', 'Himes', 'M', 32);


INSERT INTO movies (movie_name, released_year, runtime)
VALUES 
('Avatar', 2009, 162),
('Jurassic World', 2015, 124),
('Titanic', 1997, 194),
('Avengers: Age of Ultron', 2015, 141),
('Frozen', 2013, 102),
('Minions', 2015, 91),
('Transformers: Dark of the Moon', 2011, 154),
('Skyfall', 2012, 143),
('Toy Story3', 2020, 103),
('Pirates of the Caribbean: On Stranger Tines', 2010, 136),
('The Hobbit: An Unexpected Journey', 2012, 169);