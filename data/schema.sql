CREATE TABLE IF NOT EXISTS product (
    id INTEGER AUTO_INCREMENT,
    name varchar(100) NOT NULL, 
    description text NOT NULL, 
    price double(7,2) NOT NULL DEFAULT 0, 
    created TIMESTAMP NOT NULL DEFAULT now(), 
    updated TIMESTAMP NOT NULL DEFAULT now(),
    PRIMARY KEY (id)
);
INSERT INTO product (name, description, price) VALUES ('Produto 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 175.20);
INSERT INTO product (name, description, price) VALUES ('Produto 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 100.00);
INSERT INTO product (name, description, price) VALUES ('Produto 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 54.00);
INSERT INTO product (name, description, price) VALUES ('Produto 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 15.75);
INSERT INTO product (name, description, price) VALUES ('Produto 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 98.99);