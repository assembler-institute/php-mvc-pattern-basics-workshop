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