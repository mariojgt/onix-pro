<a href="https://packagist.org/packages/mariojgt/onix"><img src="https://img.shields.io/badge/license-MIT-orange" alt="License"></a>


# onix
A page builder for laravel, this package use https://grapesjs.com/ to build the pages and https://ckeditor.com/ to create like a blog post for example, all the js and css is already compiled using npm buy will still can import the files to you project and update you self, the grape page builder there is a ONIX plugins with some simple boostrap pages and a example that how you can load and save you data using the api request.

# How to Install
1: composer require mariojgt/onix

2: php artisan vendor:publish

3: acess onix/grape you should have the page example

# Note
Note that on vendor publish this package will move the npm file across make sure to backup your project files first, you can disable this action in the OnixProvider under the publish.

# Next update
Next update will add support for tailwind.
