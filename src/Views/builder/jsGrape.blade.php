<x-onix::grapeBuilder
    {{-- required --}}
    pushLocationCss="css"
    {{-- required --}}
    pushLocationJs="scripts"
    {{-- not required this is the palce where you will save and load you url--}}
    saveUrl="{{'/blog/category/save/'.'your_model_id'}}"
    {{-- not required this is the palce where you will save and load you url--}}
    loadUrl="{{'/blog/category/load/'.'your_model_id'}}"
>
    {{-- set your style like boostrap or this case tailwind so the brower can render inside the componente --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</x-onix::grapeBuilder>
