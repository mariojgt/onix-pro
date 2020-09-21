
{{-- need for the editor login --}}
<script src="{{ asset('vendor/Onix/js/app.js') }}"></script>

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
