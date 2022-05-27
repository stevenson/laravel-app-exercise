# laravel-app-exercise
a Laravel application that helps a user understand how much quantity of a product is available for use.

## App Description  
- The application displays an interface with a button and a single input that represents the requested quantity of a product.
- When the button is clicked, the interface shows either the $ value of the quantity of that product that will be applied, or an error message if the quantity to be applied exceeds the quantity on hand.
  - Note 
    - that product purchased first will be used first, therefore the quantity on hand should be the most recently purchased.
    - this means we need to track the date of purchase
  - 

## Setup
1. install php 8
  - `sudo add-apt-repository ppa:ondrej/php`
  - `sudo apt install php8.1 php8.1-cli php8.1-common php8.1-mbstring php8.1-gd php8.1-intl php8.1-xml php8.1-mysql php8.1-zip php8.1-xsl php8.1-curl`
  - check php version with: `php -v`
2. install composer
  -  `sudo apt install curl git unzip`
  -  `curl –sS https://getcomposer.org/installer | php`
  -  `sudo mv composer.phar /usr/local/bin/composer`
  -  test if your composer works with `composer -V`

## References
1. use proper commit messages: https://www.freecodecamp.org/news/how-to-write-better-git-commit-messages/
