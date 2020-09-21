
{{-- need for the editor login --}}
<script src="{{ asset('vendor/Onix/js/app.js') }}"></script>
{{-- need for the editor plugins  --}}
<script src="{{ asset('vendor/Onix/grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.js') }}"></script>
{{-- need for this package custom plugins --}}
<script src="{{ asset('vendor/Onix/onixGrape/onix_grape_plugins.js') }}"></script>

{{-- in here we start the editor with our setup --}}
<script>
    var data = "{{ $objectId }}";

    const editor = grapesjs.init({
        // Indicate where to init the editor. You can also pass an HTMLElement
        container: '#onix-grape',
        // Get the content for the canvas directly from the element
        // As an alternative we could use: `components: '<h1>Hello World Component!</h1>'`,
        fromElement: true,
        // Size of the editor
        height: '1000px',
        width: 'auto',
        // Disable the storage manager for the moment
        storageManager: { type: 'simple-storage' },
        plugins: ['gjs-preset-webpage', 'onixPlugins'], // define in here you plugins
        pluginsOpts: {
            'gjs-preset-webpage': {
                // options
            }
        }
    });

</script>
