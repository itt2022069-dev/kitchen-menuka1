CREATE DATABASE IF NOT EXISTS kitchen_menuka;

USE kitchen_menuka;


-- =====================================
-- USERS TABLE
-- =====================================

CREATE TABLE users (

    id INT AUTO_INCREMENT PRIMARY KEY,

    username VARCHAR(100) NOT NULL,

    email VARCHAR(150) NOT NULL UNIQUE,

    password VARCHAR(255) NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);


-- =====================================
-- RECIPES TABLE
-- =====================================

CREATE TABLE recipes (

    id INT AUTO_INCREMENT PRIMARY KEY,

    title VARCHAR(150) NOT NULL,

    category VARCHAR(50) NOT NULL,

    ingredients TEXT NOT NULL,

    instructions TEXT NOT NULL,

    image VARCHAR(255),

    user_id INT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE SET NULL

);


-- =====================================
-- CONTACT MESSAGES TABLE
-- =====================================

CREATE TABLE messages (

    id INT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100) NOT NULL,

    email VARCHAR(150) NOT NULL,

    message TEXT NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);


-- =====================================
-- SAMPLE RECIPES
-- =====================================

INSERT INTO recipes
(title, category, ingredients, instructions, image)
VALUES

(
    'Creamy Pasta',
    'main',
    'Pasta
Milk
Cheese
Garlic
Butter
Salt
Pepper',
    '1. Boil the pasta.
2. Melt butter in a pan.
3. Add garlic.
4. Add milk and cheese.
5. Mix the pasta with the sauce.
6. Serve hot.',
    'pasta.jpg'
),


(
    'Fried Rice',
    'main',
    'Cooked rice
Eggs
Carrot
Spring onion
Soy sauce
Salt
Pepper',
    '1. Heat a pan.
2. Add vegetables.
3. Add eggs.
4. Add cooked rice.
5. Add soy sauce.
6. Mix well and serve.',
    'rice.jpg'
),


(
    'Chocolate Cake',
    'dessert',
    'Flour
Cocoa powder
Sugar
Eggs
Milk
Butter
Baking powder',
    '1. Mix dry ingredients.
2. Add eggs and milk.
3. Add melted butter.
4. Mix the batter.
5. Bake until completely cooked.
6. Allow to cool and serve.',
    'cake.jpg'
),


(
    'Pancakes',
    'breakfast',
    'Flour
Milk
Egg
Sugar
Butter
Baking powder',
    '1. Mix all ingredients.
2. Heat a pan.
3. Pour batter into the pan.
4. Cook both sides.
5. Serve with your favourite topping.',
    'pancakes.jpg'
);