{{-- Example with custom data --}}
{{-- <x-onix::onix.main
    onix_app_js="/vendor/Onix/js/app.js" // Not Required if empty load the default
    onix_onix_preset_js="/vendor/Onix/js/onixPreset.js" // Not Required if empty load the default
    grape_code_editor="/vendor/Onix/js/grapeCodeEditor.js" // Not Required if empty load the default
    cssPath="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" // Not Required
    imageAssetUrlLoader="{{ route('onix.image.load') }}" // Not Required
    imageAssetUrlSave="{{ route('onix.image.save') }}" // Not Required
    saveUrl="{{ route('onix.save') }}" // Not Required
    loadUrl="{{ route('onix.load') }}" // Not Required
    autoLoadingUrl="{{ route('onix.component.load') }}" // Not Required
/> --}}


{{-- Example with default data --}}
<x-onix::onix.main/>
