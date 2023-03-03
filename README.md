# Onix v2

## Onix v3 is comming soon, (complete rebuild from ground up, and will integrate better with the new laravel ecosystem.)

[![ko-fi](https://ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/D1D5EJZ3P)

### Getting started

To install the package do the following.

1. composer require mariojgt/onix
2. php artisan v:p  --force
3. select the onixProvider and publish all the required assets

Notes: This package on publish will move across webpack, tailwind and package.json so make sure to backup your project files.

# Demo

After the setup you can access the demo page on /onix/grape and you should be able to see the package demo.

## How to use the pagebuilder

To use the builder you need to add the following in you blade file i recommend to use a blank blade file.

```html
<x-onix::onix.main
    cssPath="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" // Not Required
    javascriptPath="https://youraplication.js" // Not Required
    imageAssetUrlLoader="{{ route('onix.image.load') }}" // Not Required
    imageAssetUrlSave="{{ route('onix.image.save') }}" // Not Required
    saveUrl="{{ route('onix.save') }}" // Not Required
    loadUrl="{{ route('onix.load') }}" // Not Required
    autoLoadingUrl="{{ route('onix.component.load') }}" // Not Required
/>
```

1. css Path you can add you own css for example bootstrap or tailwind css by default onix use tailwind
2. imageAssetUrlLoader route you can load the images
3. imageAssetUrlSave route where you can upload images and save in the database
4. saveUrl url where you want to save your url
5. loadUrl exemple to load the pagebuilder
6. autoLoadingUrl this is where you can autoload components from Api request

Release:

2.0.3: Now the path of the javascript files is define in the config file.
2.0.4: minor bug fix
2.0.5: New feature now you can add javascript code, and also onix-pro version in development with features such as be able to create a blade file and community pages and blocks share with rating system, more info please https://onixpro.net/ (in developent)
2.0.6: code editor bug fix you may need to run (npm run watch) case using the old version, onixpro almost read for release, there still some ui usses and populating the store with some usefull components.

