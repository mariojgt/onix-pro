<x-onix::layout.main>

    <div id="gjs">

    </div>

    @push('js')
        {{-- You only need those 2 script to be able to run grapejs --}}
        {{-- Call grape js --}}
        <script src="{{ asset('vendor/Onix/js/grapeCore.js') }}"></script>
        {{-- Call the Onix plugin preset --}}
        <script src="{{ asset('vendor/Onix/js/onixPreset.js') }}"></script>
        {{-- Call Grape js code ditor plugin --}}
        <script src="{{ asset('vendor/Onix/js/grapeCodeEditor.js') }}"></script>

        <script>
            // From here bellow is not recommende to add in th builder process
            // Because you may have some extra setup you need to change
            // Load the main css if you have any
            var cssPath = "{{ asset('vendor/Onix/css/app.css') }}";

            var editor = grapesjs.init({
                container: '#gjs',
                height: '1000px',
                showOffsets: 1,
                noticeOnUnload: 0,
                fromElement: true,
                // Disable the storage manager for the moment
                storageManager: {
                    type: 'onix-storage-manager',
                    stepsBeforeSave: 3,
                },
                plugins: ['onix-preset', 'code-editor'],
                pluginsOpts: {
                    'onix-preset': {},
                },
                // Canvas where you can preload css
                canvas: {
                    styles: [
                        cssPath
                    ]
                }
            });

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
                ONIX CUSTOM STORATE START IN HERE
            */
            // This script have a base logic that how we can save or load the content
            // Here our `simple-storage` implementation
            const SimpleStorage = {};

            // Variable that you can Pass in the laravel componente
            var saveUrl = "{{ route('onix.save') }}"; // the url you want to save note they come from the component
            var loadUrl = "{{ route('onix.load') }}"; // the url you want to load note they come from the component

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
                ONIX CUSTOM STORATE ENDS IN HERE
            */

            /*
                Onix custom functions
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
                    console.log('Page saved');
                }
            /*
                End onix custom functions
            */
        </script>
    @endpush
</x-onix::layout.main>
