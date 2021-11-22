-- Create database
DROP DATABASE IF EXISTS mvcbasics;
CREATE DATABASE IF NOT EXISTS mvcbasics;
USE mvcbasics;

DROP TABLE IF EXISTS employees,
                     salaries,
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

CREATE TABLE salaries (
    id          INT AUTO_INCREMENT NOT NULL,
    emp_id          INT             NOT NULL,
    salary      INT             NOT NULL,
    from_date   DATE            NOT NULL,
    to_date     DATE            ,
    FOREIGN KEY (emp_id) REFERENCES employees (id) ON DELETE CASCADE,
    PRIMARY KEY (id, emp_id, from_date)
) 
; 

CREATE TABLE users (
    id          INT AUTO_INCREMENT  NOT NULL,
    username    VARCHAR(16)         NOT NULL,
    email       VARCHAR(255)        NOT NULL,
    password    VARCHAR(255)        NOT NULL,
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
INSERT INTO salaries (emp_id, salary, from_date, to_date)
VALUES 
(1, 9000, '2005-06-04', '2010-01-31'),
(1, 18000, '2010-02-01', '2012-12-31'),
(1, 26000, '2013-01-01', NULL),
(2, 16000, '2014-04-15', NULL),
(3, 18000, '2008-08-02', '2015-06-30'),
(3, 38000, '2015-07-01', NULL),
(4, 22000, '2020-07-30', NULL),
(5, 18000, '2014-05-30', '2020-04-30'),
(5, 36000, '2020-05-01', NULL),
(6, 40000, '2019-07-02', NULL),
(7, 42000, '2017-04-18', NULL),
(8, 12000, '2015-06-18', NULL),
(9, 24000, '2020-01-24', NULL),
(10, 18000, '2011-09-30', '2019-09-30'),
(10, 35000, '2019-10-01', NULL),
(11, 26000, '2017-02-24', NULL),
(12, 12000, '2012-03-20', NULL),
(13, 15000, '2005-11-28', '2012-08-31'),
(13, 42000, '2012-08-31', NULL),
(14, 45000, '2009-04-18', NULL),
(15, 28000, '2015-10-12', NULL);
