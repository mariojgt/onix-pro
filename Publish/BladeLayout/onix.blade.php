<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title ?? 'Onix Grape js' }}</title>
        {{ Vite::useBuildDirectory('vendor/Onix/' . session('template'))->withEntryPoints([
            'resources/vendor/Onix/js/app.js',
            'resources/vendor/Onix/css/app.css',
        ]) }}
        @stack('css')
    </head>
    <body>
        <div id="app">
            {{ $slot }}
        </div>
        @stack('js')
    </body>
</html>
