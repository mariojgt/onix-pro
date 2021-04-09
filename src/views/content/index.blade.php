{{-- Example with custom data --}}
{{-- <x-onix::onix.main
    cssPath="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" // Not Required
    imageAssetUrlLoader="{{ route('onix.image.load') }}" // Not Required
    imageAssetUrlSave="{{ route('onix.image.save') }}" // Not Required
    saveUrl="{{ route('onix.save') }}" // Not Required
    loadUrl="{{ route('onix.load') }}" // Not Required
    autoLoadingUrl="{{ route('onix.component.load') }}" // Not Required
/> --}}


{{-- Example with default data --}}
<x-onix::onix.main/>
