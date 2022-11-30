INSERT INTO shoes (id, name, size, color, price)
values
(1, 'Nike Air Max 270', 42, 'white', 170),
(2, 'Nike Air Max 90', 40, 'black', 160),
(3, 'Nike Air Max Plus', 41, 'orange', 175),
(4, 'Nike Air Max 97' , 39, 'white', 160),
(5, 'Nike LeBron IX', 43, 'blue', 210),
(6, 'Nike Free Run 2', 41, 'black', 110);

INSERT INTO shipment (id, name, price)
values
(1, "free", NULL),
(2, "cheap", "4,99€"),
(3, "expensive", "9,99€");

INSERT INTO jordans (id, name, clothes, price, size, shipment)
values
(1,	"Jordan Essentials", "jacket",	275, "L", 1),
(2,	"Jordan Sport DNA",	"t-shirt", 35,	"M", 2),
(3,	"Zion",	"hoodie", 150, "XL", 1),
(4,	"Jordan Flight Heritage", "jacket",	400, "M", 3);