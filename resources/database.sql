-- Create database
DROP DATABASE IF EXISTS php-mvc-basics;
CREATE DATABASE IF NOT EXISTS php-mvc-basics;
USE php-mvc-basics;

DROP TABLE IF EXISTS employees, travels;

-- Create tables
CREATE TABLE employees (
    emp_id      INT             NOT NULL AUTO_INCREMENT,
    first_name  VARCHAR(255)    NOT NULL,
    last_name   VARCHAR(255)    NOT NULL,
    gender      ENUM('F', 'M')  NOT NULL,
    email       VARCHAR(255)    UNIQUE NOT NULL,
    age         INT             NOT NULL,
    city        VARCHAR(255)    NOT NULL,
    street_address VARCHAR(255) NOT NULL,
    state       VARCHAR(255)    NOT NULL,
    postal_code INT             NOT NULL,
    phone_number INT,
    PRIMARY KEY (emp_no)
);

CREATE TABLE travels ();

-- Insert data to tables

INSERT INTO employees (first_name, last_name, gender, email, age, city, street_address, state, postal_code, phone_number)
VALUES
();

INSERT INTO travels ();
