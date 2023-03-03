<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Onix Grape js' }}</title>
    {{ Vite::useBuildDirectory('vendor/Onix')->withEntryPoints([
        'resources/vendor/Onix/js/app.js',
        'resources/vendor/Onix/css/app.css',
    ]) }}
    @stack('css')
</head>
<body>
    <div id="app">
        <div class="base-200 drawer">
            {{-- Id used to toogle the side menu --}}
            <input id="nav-drawer" type="checkbox" class="drawer-toggle">
            {{-- Website content --}}
            <div class="flex flex-col drawer-content">
                <x-onix::layout.navbar />
                <x-onix::layout.flash />
                <div class="px-6 py-8">
                    {{ $slot }}
                </div>
                {{-- Footer --}}
                <x-onix::layout.footer />
            </div>
            {{-- Side Menu Drawer Start here --}}
            <div class="drawer-side">
                <label for="nav-drawer" class="drawer-overlay"></label>
                <x-onix::layout.sidemenu />
            </div>
            {{-- Side Menu Drawer End here --}}
        </div>
    </div>
    @stack('js')
</body>

</html>
