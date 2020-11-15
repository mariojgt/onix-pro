<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- font-awesome cdn not need for the builder--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/brands.min.css" integrity="sha512-D0B6cFS+efdzUE/4wh5XF5599DtW7Q1bZOjAYGBfC0Lg9WjcrqPXZto020btDyrlDUrfYKsmzFvgf/9AB8J0Jw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" integrity="sha512-kJ30H6g4NGhWopgdseRb8wTsyllFUYIx3hiUwmGAkgA9B/JbzUBDQVr2VVlWGde6sdBVOG7oU8AL35ORDuMm8g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/regular.min.css" integrity="sha512-rVrbAp27ffQyFnzJ/aC5fZv9JgvL6cdB4zsL5HmM+DhJdzThc/F//62SJF+CaGiOZTP35e1p8JGcc+zRRVuhRw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/solid.min.css" integrity="sha512-SazV6tF6Ko4GxhyIZpKoXiKYndqzh7+cqxl9HDH7DGSpjkCN3QLqTAlhJHJnKxu3/2rfCsltzwFC4CmxZE1hPg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/svg-with-js.min.css" integrity="sha512-CfIjRw0J4f63YNZarIPUt9psHYYSppYFt3Ru9f0xKvhqf4piVbE8YjrM14c2uL+K2e+RAinJM6dNtLa5CnuAng==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/v4-shims.min.css" integrity="sha512-KNosrY5jkv7dI1q54vqk0N3x1xEmEn4sjzpU1lWL6bv5VVddcYKQVhHV08468FK6eBBSXTwGlMMZLPTXSpHYHA==" crossorigin="anonymous" />

</head>

<body>
<x-onix::grape-builder
    {{-- required --}}
    pushLocationCss="css"
    {{-- required --}}
    pushLocationJs="scripts"
    {{-- not required --}}
    imageLoadApi="{{ 'url_here' }}"
    {{-- not required --}}
    imageSaveApi="{{ 'url_here' }}"
    {{-- not required this is the palce where you will save and load you url--}}
    saveUrl="{{'/onix/save_page_example/'.'your_model_id'}}"
    {{-- not required this is the palce where you will save and load you url--}}
    loadUrl="{{'/onix/load_post_example/'.'your_model_id'}}"
    {{-- chagne the backgour not required--}}
    mainBackgroudColor="#000000"
    {{-- change the editor text color not required--}}
    textColor="#ffffff"
    {{-- select you plugin for this page or leave the onix as default --}}
    {{-- :plugin="'yourplugin'" --}}
>
    {{-- example plugin load --}}
    {{-- <x-slot name="pluginJs">
        <script src="{{ asset('yourplugin.js') }}"></script>
    </x-slot> --}}
    {{-- Set your style like boostrap or this case tailwind so the brower can render inside the componente --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </x-onix::grape-builder>

</body>

@stack('css')

<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous">
</script>
    @stack('scripts')

</html>
