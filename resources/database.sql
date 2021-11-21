-- Create database
DROP DATABASE IF EXISTS mvcbasics;
CREATE DATABASE IF NOT EXISTS mvcbasics;
USE mvcbasics;

DROP TABLE IF EXISTS employees,
                     users;

-- Create tables
CREATE TABLE employees (
    id      INT AUTO_INCREMENT NOT NULL,
    birth_date  DATE            NOT NULL,
    first_name  VARCHAR(14)     NOT NULL,
    last_name   VARCHAR(16)     NOT NULL,
    gender      ENUM ('M','F')  NOT NULL,
    hire_date   DATE            NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE users (
    id          INT AUTO_INCREMENT  NOT NULL,
    username    VARCHAR(16)         NOT NULL,
    password    VARCHAR(255)        NOT NULL,
    re_password    VARCHAR(255)        NOT NULL,
    PRIMARY KEY (id)
);

-- Insert data to tables

INSERT INTO employees (birth_date, first_name, last_name, gender, hire_date)
VALUES 
('1980-02-18', 'Carlos', 'Ochoa', 'M', '2005-06-04'),
('1993-02-18', 'Teresa', 'Calvo', 'F', '2014-04-15'),
('1982-02-18', 'Pilar', 'Paraiso', 'F', '2008-08-02'),
('1995-02-18', 'Virginia', 'Gomez', 'F', '2020-07-30'),
('1984-02-18', 'Ana', 'Navarra', 'F', '2014-05-30'),
('1994-02-18', 'Carlos', 'Lopez', 'M', '2019-07-02'),
('1986-02-18', 'Teresa', 'Martinez', 'F', '2017-04-18'),
('1987-02-18', 'Ana', 'Ochoa', 'F', '2015-06-18'),
('1996-02-18', 'Miguel', 'Ikene', 'M', '2020-01-24'),
('1989-02-18', 'Fernando', 'Sanchez', 'M', '2011-09-30'),
('1990-02-18', 'Paula', 'Perez', 'F', '2017-02-24'),
('1975-02-18', 'Esperanza', 'Martin', 'F', '2012-03-20'),
('1976-02-18', 'Belma', 'Gomez', 'F', '2005-11-28'),
('1977-02-18', 'Paula', 'Lopez', 'F', '2009-04-18'),
('1991-02-18', 'Juan', 'Caley', 'M', '2015-10-12');


-- Insert value to table salaries
