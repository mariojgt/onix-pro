<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

{{-- Example component --}}
<x-onix::grape-builder
    {{-- required --}}
    pushLocationCss="css"
    {{-- required --}}
    pushLocationJs="scripts"
    {{-- not required --}}
    imageLoadApi="{{ 'url_here' }}"
    {{-- not required --}}
    imageSaveApi="{{ 'url_here' }}"
    {{-- not required this is the place where you will save and load you url--}}
    saveUrl="{{'/onix/save_page_example/'.'your_model_id'}}"
    {{-- not required this is the place where you will save and load you url--}}
    loadUrl="{{'/onix/load_post_example/'.'your_model_id'}}"
    {{-- chagne the backgour not required--}}
    mainBackgroudColor="#000000"
    {{-- change the editor text color not required--}}
    textColor="#ffffff"
    {{-- select your block for this page or leave the onix as default you can change those values in the public folder--}}
    {{-- :plugin="'yourplugin'" --}}
    {{-- load the css path note the this css is only enable inside grape js make sure to use the same css for the front end page--}}
    cssPath="{{ asset('vendor/Onix/css/tailwind.css') }}"
>
    {{-- example plugin block load --}}
    {{-- <x-slot name="pluginJs">
        <script src="{{ asset('yourplugin.js') }}"></script>
    </x-slot> --}}
</x-onix::grape-builder>

</body>

{{-- Example stack css --}}
@stack('css')
    {{-- Unfortunately jquery is required --}}
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
    </script>
    {{-- example stack scripts --}}
    @stack('scripts')
</html>
