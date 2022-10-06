# iThinkWeb Backend developer coding test

## Task
You're tasked to create a simple REST web service application for an e-commerce app using Laravel.

You need to develop APIs for creating and viewing a single product. There should also be an API for viewing a list of the products.

A product needs to have the following information:

- Product name
- Product description
- Product price
- Created at
- Updated at

## Project setup
- Run `composer install` in the project root
- Create a new MySQL database named `backend_coding_test`
- Copy the `.env.example` file to a new file called `.env`
- Fill out the corresponding database values in the `.env` file
- Run `php artisan migrate` in the project root

## Requirements
- The product name should have a maximum of 255 characters, and the product price should be numeric that accepts up to two decimal places.
- The created at and updated at fields should be in timestamp format.
- The view products list API needs to be paginated.
- You are free to use any library or component just as long as it can be installed using Composer.

## Optional (for bonus points)
- Say for example, we need a feature where we can display featured products. How would you go about implementing this feature? (You don't need to write code for this, just describe how would you implement it)


## HOW DID I SETUP MY PROJECT
- I installed XAMPP for phpmyadmin and Composer for managing extensions of Laravel
- follow the project setup manual.
- A driver error was shown when doing `php artisan migrate` so I deleted the `vendor` folder and run `composer update`

