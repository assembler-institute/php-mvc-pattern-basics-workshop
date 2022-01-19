-- Database creation
DROP DATABASE IF EXISTS mvc_basics;
CREATE DATABASE IF NOT EXISTS mvc_basics;
USE mvc_basics;


CREATE TABLE rarity(
id INT(11) NOT NULL PRIMARY KEY,
name VARCHAR(60) NOT NULL,
color VARCHAR(60) NOT NULL 
);

CREATE TABLE class(
id INT(11) NOT NULL PRIMARY KEY,
name VARCHAR(50) NOT NULL
);

CREATE TABLE BRAWL(
id INT(11) NOT NULL PRIMARY KEY,
name VARCHAR(50) NOT NULL,
description VARCHAR(250) NOT NULL,
image VARCHAR(300) NOT NULL,
idclase INT(11) NOT NULL,
KEY idclase(idclase),
CONSTRAINT idclase_FK
FOREIGN KEY(idclase)
REFERENCES class(id),
idrarity INT(11) NOT NULL,
KEY idrarity(idrarity),
CONSTRAINT idrarity_FK
FOREIGN KEY(idrarity)
REFERENCES rarity(id)
);


INSERT INTO class VALUES
(15,'Damage Dealer'),
(3,'Heavyweight'),
(1,'Fighter'),
(12,'Assassin'),
(2,'Sharpshooter'),
(13,'Action Assassin'),
(8,'Support'),
(4,'Thrower'),
(11,'Batter'),
(10,'Stealthy Assassin'),
(9,'Toxic Assassin'),
(6,'Dashing Assassin')
;
INSERT INTO rarity VALUES
(7,'Chromatic','#f88f25'),
(6,'Legendary','#fff11e'),
(5,'Mythic','#fe5e72'),
(4,'Epic','#d850ff'),
(3,'Super Rare','#5ab3ff'),
(2,'Rare','#68fd58'),
(1,'Trophy Road','#b9eaff')
;