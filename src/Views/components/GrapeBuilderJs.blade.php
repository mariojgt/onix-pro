
{{-- need for the editor login --}}
<script src="{{ asset('vendor/Onix/js/app.js') }}"></script>
{{-- need for the editor plugins  --}}
<script src="{{ asset('vendor/Onix/grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.js') }}"></script>
{{-- need for this package custom plugins --}}
<script src="{{ asset('vendor/Onix/onixGrape/onix_grape_plugins.js') }}"></script>

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
        plugins: ['gjs-preset-webpage', 'onixPlugins'], // define in here you plugins
        pluginsOpts: {
            'gjs-preset-webpage': {
                // options
            }
        }
    });

    // Here our `simple-storage` implementation
    const SimpleStorage = {};

    // varaible that you can pass in the laravel componente
    var saveUrl = "{{ $saveUrl ?? '/onix/save_post/4' }}";// the url you want to save or load
    var loadUrl = "{{ $loadUrl ?? '/onix/load_post/4' }}";// the url you want to save or load
    var data = "{{ $objectId ?? '' }}";

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
                console.log(response);
                //result = response.data;
            })
            .catch(function (error) {
            })

            const result = {};

            keys.forEach(key => {
                const value = SimpleStorage[key];
                if (value) {
                    result[key] = value;
                }
            });

            // Might be called inside some async method
            clb(result);
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

            // use axig to save the html data
            axios({
                method:'post',
                url: saveUrl,
                data: {
                    data:data
                }
            })
        }
    });

    // trigger the load url
    editor.load(res => console.log('Load callback'));

</script>
