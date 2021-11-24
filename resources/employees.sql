--  Sample employee database 
--  See changelog table for details
--  Copyright (C) 2007,2008, MySQL AB
--  
--  Original data created by Fusheng Wang and Carlo Zaniolo
--  http://www.cs.aau.dk/TimeCenter/software.htm
--  http://www.cs.aau.dk/TimeCenter/Data/employeeTemporalDataSet.zip
-- 
--  Current schema by Giuseppe Maxia 
--  Data conversion from XML to relational by Patrick Crews
-- 
-- This work is licensed under the 
-- Creative Commons Attribution-Share Alike 3.0 Unported License. 
-- To view a copy of this license, visit 
-- http://creativecommons.org/licenses/by-sa/3.0/ or send a letter to 
-- Creative Commons, 171 Second Street, Suite 300, San Francisco, 
-- California, 94105, USA.
-- 
--  DISCLAIMER
--  To the best of our knowledge, this data is fabricated, and
--  it does not correspond to real people. 
--  Any similarity to existing people is purely coincidental.
-- 

DROP DATABASE IF EXISTS employees;
CREATE DATABASE IF NOT EXISTS employees;
USE employees;

SELECT 'CREATING DATABASE STRUCTURE' as 'INFO';

DROP TABLE IF EXISTS dept_emp,
  dept_manager,
  titles,
  salaries, 
  employees, 
  departments;

/*!50503 set default_storage_engine = InnoDB */;
/*!50503 select CONCAT('storage engine: ', @@default_storage_engine) as INFO */;

CREATE TABLE employees (
  emp_no      INT             NOT NULL AUTO_INCREMENT,
  birth_date  DATE            NOT NULL,
  first_name  VARCHAR(14)     NOT NULL,
  last_name   VARCHAR(16)     NOT NULL,
  gender      ENUM ('M','F')  NOT NULL,    
  hire_date   DATE            NOT NULL DEFAULT (CURRENT_DATE),
  PRIMARY KEY (emp_no)
);

CREATE TABLE departments (
  dept_no     INT             NOT NULL AUTO_INCREMENT,
  dept_name   VARCHAR(40)     NOT NULL,
  PRIMARY KEY (dept_no),
  UNIQUE  KEY (dept_name)
);

CREATE TABLE dept_manager (
	emp_no       INT             NOT NULL,
	dept_no      INT             NOT NULL,
	from_date    DATETIME        NOT NULL DEFAULT (NOW()),
	to_date      DATETIME ,
	FOREIGN KEY (emp_no)  REFERENCES employees (emp_no)    ON DELETE CASCADE,
	FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON DELETE CASCADE,
	PRIMARY KEY (emp_no,dept_no,from_date)
); 

CREATE TABLE dept_emp (
  emp_no      INT             NOT NULL,
  dept_no     INT             NOT NULL,
	from_date   DATETIME       NOT NULL DEFAULT (NOW()),
  to_date     DATETIME,
  FOREIGN KEY (emp_no)  REFERENCES employees   (emp_no)  ON DELETE CASCADE,
  FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON DELETE CASCADE,
  PRIMARY KEY (emp_no,dept_no,from_date)
);

CREATE TABLE titles (
  emp_no      INT             NOT NULL,
  title       VARCHAR(50)     NOT NULL,
  from_date   DATETIME,
  to_date     DATETIME,
  FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON DELETE CASCADE,
  PRIMARY KEY (emp_no, title)
); 

CREATE TABLE salaries (
	emp_no      INT             NOT NULL,
	salary      INT             NOT NULL,
	from_date   DATETIME        NOT NULL DEFAULT (NOW()),
	to_date     DATETIME,
	FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON DELETE CASCADE,
	PRIMARY KEY (emp_no, from_date)
); 

CREATE OR REPLACE VIEW dept_emp_latest_date AS
	SELECT emp_no, MAX(from_date) AS from_date, MAX(to_date) AS to_date
	FROM dept_emp
	GROUP BY emp_no;

# shows only the current department for each employee
CREATE OR REPLACE VIEW current_dept_emp AS
    SELECT l.emp_no, dept_no, l.from_date, l.to_date
    FROM dept_emp d
        INNER JOIN dept_emp_latest_date l
        ON d.emp_no=l.emp_no AND d.from_date=l.from_date AND l.to_date = d.to_date;

-- Insert at least 15 new employees of different gender.
-- At least 3 employees have the same name.

INSERT INTO employees (birth_date,first_name,last_name,gender,hire_date)
VALUES
  ("1996-05-08","Elliott","Mills","M","2019-04-23"),
  ("1999-07-05","Jack","Mclaughlin","M","2019-10-16"),
  ("1995-04-04","Risa","Harrison","M","2020-05-09"),
  ("1992-02-09","Addison","French","F","2020-06-27"),
  ("1993-08-20","John","Dean","M","2020-02-12"),
  ("1997-08-13","Lunea","Conner","F","2020-01-01"),
  ("1981-02-11","John","Walter","M","2020-08-21"),
  ("1981-04-13","Judith","Stone","F","2019-04-12"),
  ("1998-12-30","Jolie","Julae","F","2019-08-29"),
  ("1981-07-27","Jaime","Lott","F","2020-04-17"),
  ("1984-03-20","Frances","Beard","M","2018-11-30"),
  ("1984-10-07","Abbot","Bush","F","2019-02-03"),
  ("1987-08-16","Colleen","Skinner","M","2018-11-08"),
  ("1982-09-12","Addison","Horn","F","2019-08-05"),
  ("1990-06-03","John","Le","M","2019-06-29");

-- With salaries that are between a range of 5,000 and 50,000.
-- 5 employees must have at least two salaries in different ranges of dates and different amounts.

INSERT INTO salaries (emp_no,salary,from_date,to_date)
VALUES
  (1,29018,"2019-04-23","2020-12-31"),
	(1,39018,"2021-01-01",NULL),
  (2,18652,"2019-10-16","2020-12-31"),
	(2,28652,"2021-01-01",NULL),
	(3,25868,"2020-05-09","2020-12-31"),
  (3,30868,"2021-01-01",NULL),
  (4,40815,"2020-06-27","2020-12-31"),
	(4,45815,"2021-01-01",NULL),
  (5,38351,"2020-02-12","2020-12-31"),
	(5,45351,"2021-01-01",NULL),
  (6,16000,"2020-01-01",NULL),
  (7,16000,"2020-08-21",NULL),
  (8,16000,"2019-04-12",NULL),
  (9,16000,"2019-08-29",NULL),
  (10,30603,"2020-04-17",NULL),
  (11,44174,"2018-11-30",NULL),
  (12,48782,"2019-02-03",NULL),
  (13,6449,"2018-11-08",NULL),
  (14,16406,"2019-08-05",NULL),
  (15,19028,"2019-06-29",NULL);

-- 10 employees belong to more than one department.
-- 5 employees are managers.

INSERT INTO departments (dept_name)
VALUES
	("Manager"),
	("Marketing"),
	("Purchasing"),          
	("Human Resources"),
	("Shipping"),
	("IT"),    
	("Public Relations"),
	("Sales"),
	("Executive"),
	("Finance"),       
	("Accounting"),           
	("Treasury"); 

INSERT INTO dept_manager (emp_no,dept_no,from_date,to_date)
VALUES
	(1,1,"2019-04-23",NULL),
	(2,2,"2019-10-16",NULL),
	(3,6,"2020-05-09",NULL),
	(4,4,"2020-06-27",NULL),
	(5,5,"2020-02-12",NULL);

INSERT INTO dept_emp (emp_no,dept_no,from_date,to_date)
VALUES
	(1,1,"2019-04-23",NULL),
  (2,2,"2019-10-16",NULL),
  (3,6,"2020-05-09",NULL),
  (4,4,"2020-06-27",NULL),
  (5,5,"2020-02-12",NULL),
  (6,6,"2020-01-01",NULL),
  (7,6,"2020-08-21",NULL),
  (8,6,"2019-04-12",NULL),
  (9,6,"2019-08-29",NULL),
  (10,7,"2020-04-17","2020-12-31"),
	(10,2,"2021-01-01",NULL),
  (11,8,"2018-11-30","2020-12-31"),
	(11,3,"2021-01-01",NULL),
  (12,9,"2019-02-03","2020-12-31"),
	(12,10,"2021-01-01",NULL),
  (13,9,"2018-11-08","2020-12-31"),
	(13,10,"2021-01-01",NULL),
  (14,11,"2019-08-05","2020-12-31"),
	(14,10,"2021-01-01",NULL),
  (15,12,"2019-06-29","2020-12-31"),
  (15,10,"2021-01-01",NULL);

-- All employees have a degree and at least 5 titles are from 2020

INSERT INTO titles (emp_no, title, from_date, to_date)
VALUES
	(1,"Bussiness Administration Licenciate","2015-09-15","2019-06-30"),
  (2,"Bussiness Administration Licenciate","2015-09-15","2019-06-30"),
  (3,"Bussiness Administration Licenciate","2015-09-15","2019-06-30"),
  (4,"Bussiness Administration Licenciate","2015-09-15","2019-06-30"),
  (5,"Bussiness Administration Licenciate","2016-09-15","2020-06-30"),
  (6,"IT Technician Licenciate","2015-01-15","2019-06-30"),
  (7,"IT Technician Licenciate","2016-08-15","2020-06-30"),
  (8,"IT Technician Licenciate","2016-04-15","2010-06-30"),
  (9,"IT Technician Licenciate","2015-08-15","2019-06-30"),
  (10,"Commerce & Economy Licenciate ","2020-04-17",NULL),
	(11, "MBA", "2020-12-15", "2021-06-15"),
	(12, "MBA", "2020-12-15", "2021-06-15"),
	(13, "MBA", "2020-12-15", "2021-06-15"),
	(14, "MBA", "2020-12-15", "2021-06-15"),
	(15, "MBA", "2020-12-15", "2021-06-15");