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
    @if (Auth::check())
        <x-onix::layout.navbar />
    @endif
    <x-onix::layout.flash />
    {{ $slot }}
    <script src="{{ asset('vendor/Onix/js/app.js') }}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            });
    </script>
    @stack('js')
</body>
</html>
