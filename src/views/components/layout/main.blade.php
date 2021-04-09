<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Onix Grape js' }}</title>
    {{-- <link href="{{ asset('vendor/Onix/css/app.css') }}" rel="stylesheet"> --}}
    @stack('css')
</head>
<body>

    {{ $slot }}
    @stack('js')
</body>
</html>
