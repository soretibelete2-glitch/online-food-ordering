# Online Food Ordering System

An online food ordering web application built with PHP, MySQL, HTML and CSS. Customers can browse the menu, search for meals and place orders. Admins can manage the food items and view reports.

## Features

- User registration, login and logout
- Browse and search food items
- Place food orders
- Admin: add, update, delete and manage foods
- Admin: view order reports

## Technologies Used

- PHP
- MySQL
- HTML and CSS
- XAMPP (Apache and MySQL)

## How to Run

1. Install [XAMPP](https://www.apachefriends.org/) and start **Apache** and **MySQL**.
2. Copy the project folder into `C:\xampp\htdocs\`.
3. Open **phpMyAdmin** (`http://localhost/phpmyadmin`).
4. Create a database named `food_ordering`.
5. Import the file `food_ordering.sql` into that database.
6. Check the database settings in `db.php` (default: user `root`, empty password).
7. Open your browser and go to `http://localhost/online-food-ordering`.

## Project Files

| File | Purpose |
|------|---------|
| `index.php` | Home page |
| `register.php` / `login.php` / `logout.php` | User accounts |
| `order.php` | Place an order |
| `search.php` | Search foods |
| `add_food.php` / `update_food.php` / `delete_food.php` / `manage_foods.php` | Admin food management |
| `report.php` | Order reports |
| `db.php` | Database connection |
| `food_ordering.sql` | Database structure and data |

## Author

soretibelete2-glitch
