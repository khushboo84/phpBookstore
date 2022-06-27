CREATE TABLE books (
    bookID INT AUTO_INCREMENT,
    bookName VARCHAR(50),
    bookPrice FLOAT,
    authorName VARCHAR(50),
    bookImage VARCHAR(255),
    bookDescription TEXT,
    featured TINYINT,
    PRIMARY KEY(bookID)
);

CREATE TABLE bookstoreinventory(
    bookID INT,
    bookQuantity INT,
    PRIMARY KEY (bookID)
);

CREATE TABLE orders(
    orderID INT AUTO_INCREMENT,
    bookID INT,
    bookName VARCHAR(100),
    price FLOAT,
    PRIMARY KEY (orderID)
);