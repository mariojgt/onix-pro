
{{-- need for the editor login --}}
<script src="{{ asset('vendor/Onix/js/app.js') }}"></script>

{{-- in here we start the editor with our setup --}}
<script>

    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        extraPlugins: [ MyCustomUploadAdapterPlugin ],
        image: {
			upload: {
                panel: {
                    items: [
                        'insertImageViaUrl',
                    ]
                }
            },
		}
    } )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );

class MyUploadAdapter {
    constructor( loader ) {
        // The file loader instance to use during the upload.
        this.loader       = loader;
    }
     // Prepares the data and sends the request.
     _sendRequest( file, resolve ) {
        // Prepare the form data.
        const data         = new FormData();
        data.append( 'upload', file );

        // Important note: This is the right place to implement security mechanisms
        // like authentication and CSRF protection. For instance, you can use
        // XMLHttpRequest.setRequestHeader() to set the request headers containing
        // the CSRF token generated earlier by your application.
        // Send the request.
        //this.xhr.send( data );

        axios.post( '{{ $imageUploadUrl ?? '' }}',
        data,
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
        ).then(function (response) {
            // return the image to display in the ckeditor
            resolve( {
                default: response.data.url
            } );
        })
        .catch(function (error) {
            console.log(error);
        })
    }

    // Starts the upload process.
    upload() {

        return this.loader.file
            .then( file => new Promise( ( resolve, reject ) => {
                this._sendRequest(file, resolve);
            } ) );
    }
    // Aborts the upload process.
    abort() {
        // Reject the promise returned from the upload() method.
        server.abortUpload();
    }
}

function MyCustomUploadAdapterPlugin( editor ) {
    editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
        return new MyUploadAdapter( loader );
    };
}

</script>
