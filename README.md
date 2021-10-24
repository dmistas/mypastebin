# MyPastebin App

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Clone the repository

    git clone git@github.com:dmistas/mypastebin.git

Switch to the repo folder

    cd mypastebin

Install all the dependencies using composer

    composer install

Install JS dependencies using npm

    npm install
    npm run prod

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## Database seeding

Run the database seeder

    php artisan db:seed
