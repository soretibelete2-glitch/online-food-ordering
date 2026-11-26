CREATE DATABASE food_ordering;
USE food_ordering;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE foods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    food_name VARCHAR(100),
    price DECIMAL(6,2),
    category VARCHAR(50)
);
