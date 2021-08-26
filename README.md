# Onix v2

### Getting started

# Quick start check the link below
https://www.youtube.com/watch?v=B86iZFu4EIE

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

