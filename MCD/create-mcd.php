CREATE DATABASE Game_Family;

CREATE TABLE customer(
   id_customer INT AUTO_INCREMENT,
   lastname VARCHAR(50),
   firstname VARCHAR(50),
   mail VARCHAR(50),
   adress VARCHAR(50),
   phone VARCHAR(50),
   PRIMARY KEY(id_customer)
);

CREATE TABLE categorie(
   id_categorie INT AUTO_INCREMENT,
   name_categorie VARCHAR(50),
   PRIMARY KEY(id_categorie)
);

CREATE TABLE cart(
   id_cart INT AUTO_INCREMENT,
   cart_date DATE,
   id_customer INT NOT NULL,
   PRIMARY KEY(id_cart),
   FOREIGN KEY(id_customer) REFERENCES customer(id_customer)
);

CREATE TABLE product(
   id_product INT AUTO_INCREMENT,
   name_product VARCHAR(50),
   price INT,
   editor VARCHAR(50),
   age VARCHAR(50),
   players VARCHAR(50),
   quantity INT,
   id_categorie INT NOT NULL,
   PRIMARY KEY(id_product),
   FOREIGN KEY(id_categorie) REFERENCES categorie(id_categorie)
);

CREATE TABLE contains(
   id_product INT,
   id_cart INT,
   PRIMARY KEY(id_product, id_cart),
   FOREIGN KEY(id_product) REFERENCES product(id_product),
   FOREIGN KEY(id_cart) REFERENCES cart(id_cart)
);

// CATEGORIE TABLE

INSERT INTO categorie(name_categorie)
VALUES ("jeu familiale")

// PRODUCT TABLE

INSERT INTO product (name_product, price, editor, age, players, quantity, id_categorie)
VALUES ('Escape Game', 20, 'Hasbro', '5-10 ans', '4-6 joueurs', 5, 1);

INSERT INTO product (name_product, price, editor, age, players, quantity, id_categorie)
VALUES ('Twister Junior', 14, 'Hasbro', '3-5 ans', '4-6 joueurs', 5, 1);

INSERT INTO product (name_product, price, editor, age, players, quantity, id_categorie)
VALUES ('6 Sense', 17, 'Dujardin/TF1', '5-10 ans', '4-6 joueurs', 5, 1);

INSERT INTO product (name_product, price, editor, age, players, quantity, id_categorie)
VALUES ('Allie Gator', 21, 'Iello', '10+ ans', '4-6 joueurs', 5, 1);

INSERT INTO product (name_product, price, editor, age, players, quantity, id_categorie)
VALUES ('Qui-est-ce', 14, 'Dujardin/TF1', '5-10 ans', '4-6 joueurs', 5, 1);

INSERT INTO product (name_product, price, editor, age, players, quantity, id_categorie)
VALUES ('Monopoly Junior', 22, 'Hasbro', '3-5 ans', '2-4 joueurs', 5, 1);

INSERT INTO product (name_product, price, editor, age, players, quantity, id_categorie)
VALUES ('Chrono_Bomb', 18, 'Dujardin/TF1', '5-10 ans', '2-4 joueurs', 5, 1);

INSERT INTO product (name_product, price, editor, age, players, quantity, id_categorie)
VALUES ('Adventure Games', 26, 'Iello', '10+ ans', '6+ joueurs', 5, 1);

INSERT INTO product (name_product, price, editor, age, players, quantity, id_categorie)
VALUES ('Calendrier de l’Avent', 23, 'Iello', '10+ ans', '6+ joueurs', 5, 1);

// CUSTOMER CATEGORIE 

INSERT INTO customer (lastname, firstname, mail, adress, phone)
VALUES ('Doe', 'John', 'john.doe@example.com', '123 Main St', '555-1234');


INSERT INTO customer (lastname, firstname, mail, adress, phone)
VALUES ('Smith', 'Jane', 'jane.smith@example.com', '456 Oak St', '555-5678');


INSERT INTO customer (lastname, firstname, mail, adress, phone)
VALUES ('Johnson', 'Bob', 'bob.johnson@example.com', '789 Maple St', '555-9012');


INSERT INTO customer (lastname, firstname, mail, adress, phone)
VALUES ('Williams', 'Alice', 'alice.williams@example.com', '101 Pine St', '555-3456');


INSERT INTO customer (lastname, firstname, mail, adress, phone)
VALUES ('Brown', 'Chris', 'chris.brown@example.com', '202 Cedar St', '555-7890');


INSERT INTO customer (lastname, firstname, mail, adress, phone)
VALUES ('Jones', 'Emily', 'emily.jones@example.com', '303 Elm St', '555-2345');


INSERT INTO customer (lastname, firstname, mail, adress, phone)
VALUES ('Miller', 'David', 'david.miller@example.com', '404 Birch St', '555-6789');


INSERT INTO customer (lastname, firstname, mail, adress, phone)
VALUES ('Davis', 'Sarah', 'sarah.davis@example.com', '505 Spruce St', '555-1234');


INSERT INTO customer (lastname, firstname, mail, adress, phone)
VALUES ('Garcia', 'Michael', 'michael.garcia@example.com', '606 Pine St', '555-5678');


INSERT INTO customer (lastname, firstname, mail, adress, phone)
VALUES ('Rodriguez', 'Laura', 'laura.rodriguez@example.com', '707 Oak St', '555-9012');