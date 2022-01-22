DROP DATABASE art_gallery;
CREATE DATABASE art_gallery;

USE art_gallery;

CREATE TABLE artists(
    id int(10) AUTO_INCREMENT,
    first_name VARCHAR(15),
    last_name VARCHAR(40),
    artist_photo VARCHAR(255),
    birthday DATE,
    PRIMARY KEY (id)
);

CREATE TABLE category(
    id_cat int AUTO_INCREMENT,
    cat_name VARCHAR (20),
    cat_img VARCHAR(255),
    PRIMARY KEY(id_cat)
);

CREATE TABLE artworks(
    id int(10) AUTO_INCREMENT,
    id_artist int NOT NULL,
    id_cat int NOT NULL ,
    artwork_name VARCHAR(25),
    history TEXT,
    is_bought bit NOT NULL,
    price INT ,
    artwork_photo VARCHAR(255),
    style VARCHAR(15),
    PRIMARY KEY (id),
    FOREIGN KEY (id_artist) REFERENCES artists(id),
    FOREIGN KEY (id_cat) REFERENCES category(id_cat)

);

CREATE TABLE artists_info(
    id int AUTO_INCREMENT NOT NULL,
    id_artist int NOT NULL,
    information TEXT,
    PRIMARY KEY(id),
    FOREIGN KEY (id_artist) REFERENCES artists(id)
);


INSERT INTO artists (first_name,last_name,birthday,artist_photo) VALUES(
 "Pablo","Picasso","1881-10-25",
 "artists/picasso.jpg"
),
(
    "Leonardo","Da Vinci","1452-04-15",
    "artists/leonardo.jpg"
),
(
    "Vincent","van Gogh","1853-03-30",
    "artists/vincent.jpg"
),
(
    "Miguel Angel","Buonarroti","1475-03-06",
    "artists/miguel.jpg"
),
(
    "Salvador Felipe", "Dali i Domenech","1904-05-11",
    "artists/salvador.jpg"
),
(
    "Henri Emile","Benoit Matisse","1869-12-31",
    "artists/henri.jpg"
),
(
    "Claude","Monet","1840-11-14",
    "artists/claude.jpg"
);
INSERT INTO artists_info(id_artist, information) VALUES(
    1,    "Pablo Ruiz Picasso (Malaga, October 25, 1881-Mougins, April 8, 1973) was a Spanish painter and sculptor, creator, along with Georges Braque, of Cubism.
   He is considered since the genesis of the twentieth century as one of the greatest painters who participated in the various artistic movements that spread around the world 
   and exerted a great influence on other great artists of his time. His works are present in museums and collections throughout Europe and the world. 
   In addition, he tackled other genres such as drawing, engraving, book illustration, sculpture, 
   ceramics and set and costume design for theatrical productions. He also has a short literary work. "
),
(
    2,"Leonardo da Vinci was a Florentine polymath of the Italian Renaissance. 
    He was a painter, anatomist, architect, paleontologist, artist, botanist, scientist, writer, 
    sculptor, philosopher, engineer, inventor, musician, poet and town planner."
),
(
    3,"Vincent Willem van Gogh was a Dutch painter, one of the leading exponents of post-impressionism. 
    He painted some 800 paintings and made more than 1600 drawings. A central figure in his life was his younger brother Theo, 
    an art dealer in Paris, who gave him continuous and disinterested financial support."
),
(
    4,"Michelangelo Buonarroti (Caprese, March 6, 1475-Rome, February 18, 1564), known in English as Michelangelo, 
    was an Italian Renaissance architect, sculptor and painter, considered one of the greatest artists in history both for his sculptures and for his paintings and architectural 
    work.1 He developed his artistic work over more than seventy years between Florence and Rome."
),
(
    5,"Marquis of Dali de Pubol was a Spanish painter, sculptor, engraver, scenographer and writer of the twentieth century. He is considered one of the greatest 
    representatives of surrealism. Salvador Dali is known for his striking and dreamlike surrealist images."
);

INSERT INTO category (cat_name,cat_img) VALUES
("Historic paintings","category/historic.jpg"),
("Portraits","category/portrait.jpg"),
("Landscape painting","category/landscape.jpg"),
 ("cinetic art","category/cinetic.jpg");

INSERT INTO artworks (id_artist,id_cat,artwork_name,history,is_bought,price,
artwork_photo,style) VALUES(
    2,1,"The last Supper",
    "The Last Supper is an original mural painting by Leonardo da Vinci executed between 1495 and 1498. It is located on the wall on which it was originally painted, in the refectory of the Dominican convent of Santa Maria delle Grazie, in Milan, declared a World Heritage Site by Unesco in 1980.",
    0,400000000,"paintings/lastsupper.jpg", "Renacentism"
),
(
    2,2,"Mona lisa",
    "The Portrait of Lisa Gherardini, wife of Francesco del Giocondo,1 better known as La Gioconda (La Joconde in French) or Monna Lisa, is a pictorial work by the Italian Renaissance polymath Leonardo da Vinci. It was acquired by King Francis I of France in the early 16th 
    century and has since been owned by the French state.",
    0,200000,"paintings/mona.jpg", "Renacentism"
),
(
    6,1,"La musique",
    "The music is a wall-sized painting by Henri Matisse in 1910. The painting was commissioned by Sergei Shchukin, who hung it with Matisse's 1910 Dance on the staircase of his Moscow mansion.",
    0,500000,"paintings/musique.jpg","Oil on canvas"
),
(
    1,1,"Guernica",
    "Guernica is a painting by Pablo Picasso, painted in Paris 2 between the months of May and June 1937, whose title refers to the bombing of Guernica, which occurred on April 26 of that year (1937), during the Spanish Civil War. It was commissioned by the Director General of Fine Arts, Josep Renau, at the request of the Government of the Second Spanish Republic to be exhibited in the Spanish pavilion during the International Exhibition of 1937 in Paris, in order to attract public attention to the Republican cause in the midst of the Spanish Civil War.",
    0,1000000, "paintings/guernica.jpg","Cubism"
),
(
    1,2,"Ambroise Vollard",
    "Portrait of Ambroise Vollard is an oil on canvas by Pablo Picasso, which he painted in 1910. It is currently housed in the Pushkin Museum in Moscow. The painting is a depiction of the influential art dealer Ambroise Vollard, who played an important role in Picasso's early career as an artist.",
    0,20000,"paintings/vollard.jpg","Cubism"
),
(  
    3,2,"Self-Portrait",
    "he observed himself critically in a mirror. Painting oneself is not an innocuous act: it is a questioning which often leads to an identity crisis.
    People say, and I am willing to believe it, that Thus he wrote to his sister: 'I am looking for a deeper likeness than that obtained by a photographer.' And later to his brother: 'it is hard to know yourself. But it is not easy to paint yourself, either'.",
    0,5000000,"paintings/self.jpg", "Modern art"
),
(
    3,3,"The Starry Night",
    "The Starry Night is an oil on canvas by the Dutch Post-Impressionist painter Vincent van Gogh. Painted in June 1889, it depicts the view from the east-facing window of his asylum room in Saint-Rémy-de-Provence, just before dawn, with the addition of an imaginary village.",
    0,300000,"paintings/starry.jpg","Modern art"
),

(
    4,1,"The last judgment",
    "The Last Judgment or The Last Judgment is the mural frescoed by Michelangelo to decorate the apse of the Sistine Chapel (Vatican City, Rome). Michelangelo began painting it 25 years after he finished painting the vault of the chapel.",
    0,700000,"paintings/judgment.jpg","Renacentism"
),
(
    4,4,"David",
    "The David is a white marble sculpture 5.17 meters1 high and 5572 kilograms in mass,2 made by Michelangelo Buonarroti between 1501 and 1504, commissioned by the Opera del Duomo of the Cathedral of Santa Maria del Fiore in Florence. ",
    0,100000,"paintings/david.jpg","Renacentism"
),
(
    6,2,"The Green Stripe",
    "The Green Stripe-also called Madame Matisse-is an oil painting by French painter Henri Matisse. Matisse painted this portrait in 1905, using his wife, Amélie Noellie Matisse-Parayre, as his model.",
    0,150000,"paintings/green.jpg","Oil on canvas"
),
(
    5,2,"Galatea of the Sheres",
    "Galatea of the Spheres is a painting by Salvador Dalí in 1952. It depicts Gala Dalí, Salvador's wife and muse, forming herself with a series of spheres.",
    0,15000,"paintings/galatea.jpg","Surrealism"
);
