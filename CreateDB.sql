-- create a new database
CREATE DATABASE GuestBook;

-- switch to your database
USE GuestBook;

-- create a new user
CREATE USER 'Lucas'@'localhost' IDENTIFIED BY 'Lucas1';

-- grant all privileges on all tables in GuestBook database to Lucas
GRANT ALL PRIVILEGES ON GuestBook.* TO 'Lucas'@'localhost';

-- create a table called Visitors
CREATE TABLE visitors (
    first_name VARCHAR(40) NOT NULL,
    last_name VARCHAR(40) NOT NULL
);

-- I used this query to make sure my entries were writing to the database.
USE GuestBook;
SELECT first_name, last_name FROM visitors;