<x-onix::layout.main>

    <div id="gjs">

    </div>

    @push('js')
        {{-- Call main scripts you need this because is using the axios request --}}
        <script src="{{ asset('vendor/Onix/js/app.js') }}"></script>
        {{-- Call the Onix plugin preset --}}
        <script src="{{ asset('vendor/Onix/js/onixPreset.js') }}"></script>
        {{-- Call Grape js code ditor plugin --}}
        <script src="{{ asset('vendor/Onix/js/grapeCodeEditor.js') }}"></script>

        <script>
            /*
                CORE SYSTEM VARIABLES START
            */
                // Load the main css if you have any
                var cssPath             = "{{ $cssPath ?? asset('vendor/Onix/css/app.css') }}";
                // URL Image load asset manager
                var imageAssetUrlLoader = "{{ $imageAssetUrlLoader ?? route('onix.image.load') }}";
                // URL Image save asset manager
                var imageAssetUrlSave = "{{ $imageAssetUrlSave ?? route('onix.image.save') }}";
                // RUN THAT WILL SAVE THE PAGE DATA
                var saveUrl = "{{ $saveUrl ?? route('onix.save') }}";
                // URL THAT WILL LOAD THE PAGE DATA
                var loadUrl = "{{ $loadUrl ?? route('onix.load') }}";
                // URL FOR THE AUTOBLOCK LOADING
                var autoLoadingUrl = "{{ $autoLoadingUrl ?? route('onix.component.load') }}"
            /*
                CORE SYSTEM VARIABLES END
            */

            // Crsf token need to upload images
            var csrf = '{{ csrf_token() }}';

            // EDITOR START
            var editor = grapesjs.init({
                container: '#gjs',
                height: '1000px',
                showOffsets: 1,
                noticeOnUnload: 0,
                fromElement: true,
                // YOUR CUSTOM STORAGE
                storageManager: {
                    type: 'onix-storage-manager',
                    stepsBeforeSave: 3,
                },
                // CUSTOM PLUGINS CAN BE ADDED IN HERE
                plugins: ['onix-preset', 'code-editor'],
                pluginsOpts: {
                    'onix-preset': {},
                },
                // CANVAS WHERE YOU CAN PRELOAD CSS
                canvas: {
                    styles: [
                        cssPath
                    ]
                },
                // YOUR CUSTOM IMAGE UPLOADER
                assetManager: {
                    // IN HERE I AM PASSING THE END POINT THAT WILL HANDLE THE UPLOAD
                    upload: imageAssetUrlSave,
                    // CUSTOM HEADER FOR LARAVEL
                    headers: {
                        'X-CSRF-TOKEN': csrf
                    },
                    // NAME OF THE FILES UPLOADED
                    uploadName: 'files',
                },
            });

            /*
                PLUGINS NEED FOR THE CODE EDITOR START
            */
            //  Required for the code editor to work
            const pn = editor.Panels;
            const panelViews = pn.addPanel({
                id: 'views'
            });
            panelViews.get('buttons').add([{
                attributes: {
                    title: 'Open Code'
                },
                className: 'fa fa-file-code-o',
                command: 'open-code',
                togglable: false, //do not close when button is clicked again
                id: 'open-code'
            }]);
            /*
                PLUGINS NEED FOR THE CODE EDITOR END
            */

            /*
                ONIX CUSTOM STORAGE START IN HERE
            */
            // This script have a base logic that how we can save or load the content
            // Here our `simple-storage` implementation
            const SimpleStorage = {};

            // Custon grape onix storage
            editor.StorageManager.add('onix-storage-manager', {

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
                        // The loop and get the object content
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

            /*
                ONIX CUSTOM STORAGE ENDS IN HERE
            */

            /*
                ONIX CUSTOM ASSTET MANAGER
            */
            // Asset manager Function that load the images
            function loadImages(url = imageAssetUrlLoader) {
                // Get the Asset Manager module first
                const am = editor.AssetManager;
                // Do the axios request
                axios.get(url, {})
                    .then(function(response) {
                        for (const [key, value] of Object.entries(response.data)) {
                            am.add(value);
                        }
                    })
                    .catch(function(error) {})
            }

            // Load the files on start
            loadImages();

            // Once finish the uplaod fecth the files
            editor.on('asset:upload:end', () => {
                loadImages();
            });
            /*
                ONIX CUSTOM ASSTER MANAGER END
            */

            /*
                ONIX CUSTOM FUNCTIONS
            */
            // trigger the load url on start

                editor.load(res => console.log('Page Loaded'));
                // load the content
                function loadOnixContent() {
                    // Load the data
                    editor.load();
                }
                // Trigger the save content
                function saveOnixContent() {
                    // Save the Data
                    editor.store();
                }
            /*
                END ONIX CUSTOM FUNCTIONS
            */


            /*
                AUTOBLOCK LOADING BEGIN
            */
            function autoloadBlocks() {

                // Block manager
                var blockManager = editor.BlockManager;
                // The api request to get the new blocks
                axios.get(autoLoadingUrl, {})
                .then(function (response) {
                    for (const [key, value] of Object.entries(response.data)) {
                        // 'my-first-block' is the ID of the block
                        blockManager.add(value.name, {
                            label: value.name,
                            category: value.category,
                            attributes: { class: 'fa fa-link' },
                            content: value.content,
                        });
                    }
                })
                .catch(function (error) {
                });

            }
           /*
                AUTOBLOCK LOADING END
            */

        </script>
    @endpush

</x-onix::layout.main>
