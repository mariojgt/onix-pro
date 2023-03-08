# Onix v3

Onix is a page builder that integrates with laravel, the new version 3 is a complete rewrite of the previous version, it is now integrate better with laravel and it is more flexible.

to install it you can use composer:

    composer require onix/laravel
    php artisan install:onix
    // add the following line to the .env file
    VITE_ONIX_API_KEY=any_value // this is to avoid unwanted requests to the api

## Features
- Page builder
- Page builder blocks
- Blocks based in the php classes and blade templates

To create a new reusable block using php class you can use the artisan command:

    php artisan onix:block

and follow the instructions, this will create a new block class and blade template in the `resources/onix/blocks` folder.
and the php class will be in the `app/Onix/Blocks` folder.

to acess the page builder you can use the path `onix/pages/index`
