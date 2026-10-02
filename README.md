# Kitchen Menuka

Kitchen Menuka is a PHP and MySQL-based recipe management website. It allows users to browse recipes, register and log in, and manage recipes through the system.

## Features

* User registration
* User login and logout
* Recipe browsing
* Recipe management
* Add recipe functionality
* Dashboard
* Contact page
* MySQL database integration
* Responsive website styling

## Technologies Used

* PHP
* MySQL
* HTML
* CSS
* JavaScript
* XAMPP

## Requirements

Before running the project, install:

* XAMPP or WAMP
* PHP
* MySQL
* Web browser

## Installation and Setup

### 1. Clone or Download the Project

Place the project folder inside the XAMPP `htdocs` directory.

For XAMPP:

```text
C:\xampp\htdocs\KitchenMenuka
```

### 2. Start XAMPP

Open XAMPP Control Panel and start:

* Apache
* MySQL

Both services should be running before opening the website.

### 3. Create the Database

Open phpMyAdmin in your browser:

```text
http://localhost/phpmyadmin/
```

Create a new database for the project.

For example:

```text
kitchen_menuka
```

### 4. Import the Database

1. Open phpMyAdmin.
2. Select the `kitchen_menuka` database.
3. Click the **Import** tab.
4. Click **Choose File**.
5. Select the `database.sql` file from the project folder.
6. Click **Import** or **Go**.
7. Wait until the import is completed successfully.

### 5. Check Database Configuration

Open:

```text
includes/db.php
```

Make sure the database connection details match your local MySQL configuration.

Typical XAMPP settings are:

```text
Host: localhost
Username: root
Password: 
Database: kitchen_menuka
```

If your database name is different, update it in `includes/db.php`.

### 6. Run the Project

Open a web browser and visit:

```text
http://localhost/KitchenMenuka/
```

The Kitchen Menuka website should now open.

## Project Structure

```text
KitchenMenuka/
│
├── add_recipe.php
├── contact.php
├── dashboard.php
├── database.sql
├── index.php
├── recipes.php
│
├── auth/
│   ├── login.php
│   ├── logout.php
│   └── register.php
│
├── css/
│   └── style.css
│
├── js/
│   └── script.js
│
├── includes/
│   ├── db.php
│   ├── footer.php
│   └── header.php
│
└── images/
    └── recipe images
```

## Running with WAMP

If using WAMP instead of XAMPP:

1. Copy the project folder to the WAMP `www` directory.
2. Start Apache and MySQL from WAMP.
3. Open phpMyAdmin.
4. Create the project database.
5. Import `database.sql`.
6. Check the database settings in `includes/db.php`.
7. Open the project using:

```text
http://localhost/KitchenMenuka/
```

## Database

The project includes a database export file:

```text
database.sql
```

This file contains the database structure and required data for setting up the project.

## Author

Kitchen Menuka Project
