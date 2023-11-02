CREATE DATABASE bookstore;

CREATE TABLE book(
  isbn CHAR(13) NOT NULL,
  title VARCHAR(255) NOT NULL,
  author VARCHAR(255) NOT NULL,
  stock SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  price FLOAT UNSIGNED
);

ALTER TABLE book
 ADD id INT UNSIGNED NOT NULL AUTO_INCREMENT 
 PRIMARY KEY FIRST;

ALTER TABLE book ADD UNIQUE KEY (isbn);

INSERT INTO book (isbn,title,author,stock,price) VALUES
    ("9780882339726","1984","George Orwell",12,7.50),
    ("9789724621081","1Q84","Haruki Murakami",9,9.75),
    ("9780736692427","Animal Farm","George Orwell",8,3.50),
    ("9780307350169","Dracula","Bram Stoker",30,10.15),
    ("9780753179246","19 minutes","Jodi Picoult",0,10);