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
    saveUrl="{{'/blog/category/save/'.'your_model_id'}}"
    {{-- not required this is the palce where you will save and load you url--}}
    loadUrl="{{'/blog/category/load/'.'your_model_id'}}"
    {{-- chagne the backgour not required--}}
    mainBackgroudColor="#000000"
    {{-- change the editor text color not required--}}
    textColor="#ffffff"
    {{-- select you plugin for this page or leave the onix as default --}}
    {{-- :plugin="'dsmBuilder'" --}}
>
    {{-- example plugin load --}}
    {{-- <x-slot name="pluginJs">
        <script src="{{ asset('vendor/adminui/pagebuilder/dsmBuilder.js') }}"></script>
    </x-slot> --}}
    {{-- Set your style like boostrap or this case tailwind so the brower can render inside the componente --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</x-onix::grape-builder>
