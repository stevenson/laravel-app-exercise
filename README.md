# laravel-app-exercise

a Laravel application that helps a user understand how much quantity of a product is available for use.

## App Description

-   The application displays an interface with a button and a single input that represents the requested quantity of a product.
-   When the button is clicked, the interface shows either the \$ value of the quantity of that product that will be applied, or an error message if the quantity to be applied exceeds the quantity on hand.
    -   Note
        -   that product purchased first will be used first, therefore the quantity on hand should be the most recently purchased.
        -   this means we need to track the date of purchase
    -

## Setup

1. install php 8
    - `sudo add-apt-repository ppa:ondrej/php`
    - `sudo apt install php8.1 php8.1-cli php8.1-common php8.1-mbstring php8.1-gd php8.1-intl php8.1-xml php8.1-mysql php8.1-zip php8.1-xsl php8.1-curl`
    - check php version with: `php -v`
2. install composer
    - `sudo apt install curl git unzip`
    - `curl –sS https://getcomposer.org/installer | php`
    - `sudo mv composer.phar /usr/local/bin/composer`
    - test if your composer works with `composer -V`
3. migration
    - before migration setup the values for your db in your `.env` file
    - run migration to create the tables `php artisan migrate`
        - note: I left the default tables of laravel
    - run seeder to seed the db
        - `php artisan db:seed`
        - note: if you check the seeding file I manually seed the db and did not use a factory. The reason for this is that the entries are order and value specific.
4. (optional) install some dev tools
    - install clockwork 
        - there is a clockwork plugin for chrome and firefox
        - install clockwork to your laravel project `composer require itsgoingd/clockwork`

## References

1. use proper commit messages: https://www.freecodecamp.org/news/how-to-write-better-git-commit-messages/
2. laravel naming conventions: 
    - https://xqsit.github.io/laravel-coding-guidelines/docs/naming-conventions/
    - https://www.php-fig.org/psr/psr-2/

## Use
1. API
    - there is an api for creating product consumption 
        ```
        curl --location --request POST 'http://localhost:8000/api/product/apply' \
        --header 'Content-Type: application/json' \
        --data-raw '{
            "quantity": 10
        }'
        ```
    - the routes are visible via `php artisan route:list`
    - so far the consumption is the only route that is implemented
2. Web
    - product consumption page
    - ledger listing and specific item
