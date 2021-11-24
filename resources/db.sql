--DB CREATION

CREATE TABLE `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `year` int DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  `mov_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `mov_id` (`mov_id`),
  CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  CONSTRAINT `books_ibfk_2` FOREIGN KEY (`mov_id`) REFERENCES `movements` (`id`)
);

CREATE TABLE `authors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `death_date` datetime DEFAULT NULL,
  `death_age` int DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `movements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

--DB INSERTION
--mysqldump -h 127.0.0.1 -u root -p/assword/ mvc_basics

INSERT INTO `authors` VALUES (1,'Percy','Shelley','UK','English','1822-07-08 00:00:00',29),(2,'George','Byron','UK','English','1824-04-19 00:00:00',36),(3,'Victor','Hugo','France','French','1885-05-22 00:00:00',83),(4,'Charles','Baudelaire','France','French','1867-08-31 00:00:00',46),(5,'Arthur','Rimbaud','France','French','1891-11-10 00:00:00',37),(6,'Stéphan','Mallarmé','France','French','1898-09-09 00:00:00',56),(7,'Rubén ','Darío','Nicaragua','Spanish','1916-02-06 00:00:00',49),(8,'José','de Espronceda','Spain','Spanish','1842-05-23 00:00:00',34),(9,'Federico','García Lorca','Spain','Spanish','1936-08-19 00:00:00',38),(10,'Paul','Valéry','France','French','1945-07-20 00:00:00',73),(11,'Stefan','George','Germany','German','1933-12-04 00:00:00',65),(12,'Rafael','Alberti','Spain','Spanish','1999-10-28 00:00:00',96),(13,'André','Breton','France','French','1966-09-28 00:00:00',70),(14,'Pablo','Neruda','Chile','Spanish','1973-09-23 00:00:00',69),(15,'César','Vallejo','Perú','Spanish','1938-04-15 00:00:00',46);

INSERT INTO `books` VALUES (1,'Les fleurs du mal','French',1857,4,2),(2,'Don Juan','English',1832,2,1),(3,'Ozymandias','English',1818,1,1),(4,'La légende des siècles ','French',1883,3,1),(5,'Une saison en enfer','French',1873,5,2),(6,'Divagations','French',1897,6,2),(7,'Azul...','Spanish',1888,7,3),(8,'El diablo mundo','Spanish',1841,8,1),(9,'Romancero gitano','Spanish',1928,9,4),(10,'Poeta en Nueva York','Spanish',1930,9,6),(11,'Le cimetière marin','French',1920,10,2),(12,'Das Neue Reich','German',1928,11,5),(13,'Sobre los ángeles','Spanish',1929,12,6),(14,'L\'union libre','French',1931,13,6),(15,'Residencia en la tierra','Spanish',1931,14,4),(16,'Trilce','Spanish',1922,15,6),(17,'Poemas humanos','Spanish',1939,15,4);

INSERT INTO `movements` VALUES (1,'Romanticism'),(2,'Symbolism'),(3,'Modernismo'),(4,'Vanguardia'),(5,'Modernism'),(6,'Surrealism');