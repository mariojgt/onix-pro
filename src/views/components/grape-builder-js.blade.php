
{{-- need for the editor login --}}
<script src="{{ asset('vendor/Onix/js/app.js') }}"></script>
{{-- need for the editor standard plugins  --}}
{{-- <script src="{{ asset('vendor/Onix/grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.js') }}"></script> --}}
{{-- need for this package custom plugins --}}
<script src="{{ asset('vendor/Onix/onixGrape/onix_grape_plugins.js') }}"></script>

{{-- the plugins will go here --}}
 {{ $slot }}

{{-- in here we start the editor with our setup --}}
<script>

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
        storageManager: {
            type: 'simple-storage',
            stepsBeforeSave: 3,
        },
        plugins: ['{{ $plugin }}'], // define in here you plugins
        // old example loading the standart
        // plugins: ['gjs-preset-webpage', '{{ $plugin }}'],
        // pluginsOpts: {
        //     'gjs-preset-webpage': {
        //         // options
        //     }
        // },
        assetManager: {
            // Upload endpoint, set `false` to disable upload, default `false`
            upload: '{{ $imageSaveApi ?? '' }}',
            // Custom headers to pass with the upload request
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // The name used in POST to pass uploaded files, default: `'files'`
            uploadName: 'files',
        },
    });

    // Here our `simple-storage` implementation
    const SimpleStorage = {};

    // varaible that you can pass in the laravel componente
    var saveUrl = "{{ $saveUrl ?? '/onix/save_post/4' }}";// the url you want to save note they come from the component
    var loadUrl = "{{ $loadUrl ?? '/onix/load_post/4' }}";// the url you want to load note they come from the component

    editor.StorageManager.add('simple-storage', {
        /**
         * Load the data
         * @param  {Array} keys Array containing values to load, eg, ['gjs-components', 'gjs-style', ...]
         * @param  {Function} clb Callback function to call when the load is ended
         * @param  {Function} clbErr Callback function to call in case of errors
         */
        load(keys, clb, clbErr) {

            // load the data from the url you need
            axios.get(loadUrl, {
            })
            .then(function (response) {
                // Get the data
                keys = response.data.data;
                // create the contant that will hold the temp page
                const result = {};
                // do the loop and get the object content
                for (const [key, value] of Object.entries(keys)) {
                    if (value) {
                        result[key] = value;
                    }
                }
                // Might be called inside some async method
                // save the data
                clb(result);

            })
            .catch(function (error) {
            })
        },

        /**
         * Store the data
         * @param  {Object} data Data object to store
         * @param  {Function} clb Callback function to call when the load is ended
         * @param  {Function} clbErr Callback function to call in case of errors
         */
        store(data, clb, clbErr) {
            for (let key in data) {
                SimpleStorage[key] = data[key];
            }
            // Might be called inside some async method
            clb();

            // use axios to save the html data
            axios({
                method:'post',// method to save the data
                url: saveUrl,// the url you define in the component
                data: {
                    data:data// the data you want to save
                }
            })
        }
    });

    // trigger the load url on start
    editor.load(res => console.log('Load callback'));

    // load the content
    function loadContent() {
        // Load the data
        editor.load();
    }

    // trigger the save content
    function saveContent() {
        // Save the Data
        editor.store();
        console.log('Page saved');
    }
    // Function that load the images
    function loadImages(url = '{{ $imageLoadApi ?? '' }}') {
        // Get the Asset Manager module first
        const am = editor.AssetManager;

        // do the axios request
        axios.get(url, {
        })
        .then(function (response) {
            // Do a foreach in the object so we can add the urls of the files
            response.data.forEach(function(entry) {
                am.add(entry);
            });
        })
        .catch(function (error) {
        })
    }
    // call the image loader
    loadImages();
</script>
