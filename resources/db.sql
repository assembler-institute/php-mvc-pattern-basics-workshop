CREATE DATABASE greek_mythology;

CREATE TABLE gods(
    id INT AUTO_INCREMENT,
    greek_name VARCHAR(100),
    roman_name VARCHAR(100),
    power VARCHAR(100),
    symbol VARCHAR(100),
    father VARCHAR(100),
    mother VARCHAR(100),
PRIMARY KEY (id)
);

INSERT INTO gods (greek_name, roman_name, power, symbol, father, mother)
VALUES
('Aphrodite','Venus','Love\, beauty\, procreation','Eros (winged godling)\, conch-shell','Zeus','Dione'),
('Apollo','Apollo','Music\, prophecy\, healing\, archery','Lyre\, bow','Zeus','Leto'),
('Ares','Mars','War\, courage\, battlelust','Helm','Zeus','Hera'),
('Artemis','Diana','Hunting\, wild animals\, children','Bow and arrows','Zeus','Leto'),
('Athena','Minerva','Wisdom\, war\, weaving\, crafts','Aegis\, gorgoneion','Zeus','Metis'),
('Demeter','Ceres','Grain\, bread\, agriculture','Sheaf of grain\, cornucopia','Cronus','Rhea'),
('Dionysus','Liber','Wine\, festivity\, madness','Thyrsus (pine-cone staff)','Zeus','Semele'),
('Hephaestus','Vulcan','Smiths\, fire\, metalworking','Hammer & tongs','None','Hera'),
('Hera','Juno','Marriage\, sky\, queen of the gods','Royal sceptre','Cronus','Rhea'),
('Hermes','Mercurius\, Mercury','Herds\, trade\, thievery\, athletics\, messengers','Caduceus (herald''s wand)','Zeus','Maia');

CREATE TABLE IF NOT EXISTS heroes(
    id INT AUTO_INCREMENT,
    name VARCHAR(100),
    hero_type VARCHAR(100),
    father VARCHAR(100),
    mother VARCHAR (100),
    power VARCHAR(100),
    home VARCHAR(100),
PRIMARY KEY(id)
);

INSERT INTO heroes (name, hero_type, father, mother, power, home)
VALUES
('Atlanta','Demigod','Iasus','Clymene','Hunting','Arcadia'),
('Bellerophon','Demigod','Poseidon','Eurynome','Spear','Lycia'),
('Callisto','Human','Lycaon','Nonacris','Became Ursa Major (Bear)','Arcadia'),
('Danae','Human','Acrisius','Eurydice','N/A','Island of Seriphus');