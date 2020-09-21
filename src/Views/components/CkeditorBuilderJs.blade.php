
{{-- need for the editor login --}}
<script src="{{ asset('vendor/Onix/js/app.js') }}"></script>
{{-- need for the editor plugins  --}}
<script src="{{ asset('vendor/Onix/grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.js') }}"></script>

{{-- in here we start the editor with our setup --}}
<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>
