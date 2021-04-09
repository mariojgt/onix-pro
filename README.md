![image info](https://raw.githubusercontent.com/mariojgt/onix/master/Publish/Public/image/onix.png)

# Onix
This Laravel packages contain a very simple structure for any kind of packages development for Laravel.

# Features

- [ ] Clean and basic start point in Laravel package development.
- [ ] Webpack setup with tailwind css ,sweetalert2 and vue3 basic setup.
- [ ] Simple out of the box Laravel Authentication.
- [ ] Example Laravel components, and layout structure.
- [ ] Tailwind with npm presetup for runing with packages.
- [ ] Republish command
- [ ] Reusable laravel layout
- [ ] Dynamic form
- [ ] Lightweight
- [ ] Dark|light mode out of the box

# Installation

You have 2 options.

### First option via composer

1. composer require mariojgt/onix
2. php artsain vendor:publish --force  (select the package number)

### Second Option gitclone (Recommended if you like to change and make to your own)

1. git clone https://github.com/mariojgt/onix

2. Setup you composer to use local VCS

3. ```javascript
   "repositories": [
           {
               "type" : "path",
               "url": "packages/onix", // Path to your local folder package
               "options": {
                   "symlink": true
               }
           }
       ],
       "require": {
           "php": "^7.3|^8.0", //Example
           "fideloper/proxy": "^4.4",//Example
           "fruitcake/laravel-cors": "^2.0",//Example
           "guzzlehttp/guzzle": "^7.0.1",//Example
           "laravel/framework": "^8.12",//Example
           "laravel/tinker": "^2.5",//Example
           "mariojgt/onix": "@dev"// Here is where you add the package reference
       },
   ```

4. php artsain vendor:publish --force  (select the package number)

## Command Republish

The following commands

```php
php artisan republish:onix
```

Will move you changes in your resources like the js or css back to the packages useful to speed up development.

# Packages info

This package purpose is to give a fresh start for a new package so you can use those premade tools or just delete and use the package onix.
# Easy way to install

```php
php artisan install:onix
```
