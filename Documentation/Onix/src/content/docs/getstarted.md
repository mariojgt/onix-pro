---
draft: false
title: Onix - Get started
snippet: "Learn the basics of onix CoGet started"
image: {
    src: "https://raw.githubusercontent.com/mariojgt/onix/main/Documentation/Onix/imgs/Started.png",
    alt: "full stack web development"
}
publishDate: "2022-11-08 11:39"
category: "controls"
author: Mario Tarosso
tags: [started, docs, getstarted]
---

## Get started

Onix is a page builder that integrates with laravel, the new version 3 is a complete rewrite of the previous version, it is now integrate better with laravel and it is more flexible.

To start run the following command:

    'composer require mariojgt/onix'

    'php artisan install:onix'
    // add the following line to the .env file
    VITE_ONIX_API_KEY=any_value // this is to avoid unwanted requests to the api

### Creating reusable blocks
    php artisan onix:block

    and follow the instructions, this will create a new block class and blade template in the `resources/onix/blocks` folder.
    and the php class will be in the `app/Onix/Blocks` folder.

### Accessing the page builder
to acess the page builder you can use the path `onix/pages/index`
