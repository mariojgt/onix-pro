{{-- Check if the push css empty if yes them just display it may not work correct so i recoment use the push --}}
@if (empty($pushLocationCss))
    {{-- pushh the css need for this plugisn to work  --}}
    <x-onix::BuilderCss />
@else
    @push($pushLocationCss)
        {{-- pushh the css need for this plugisn to work  --}}
        <x-onix::BuilderCss/>
    @endpush
@endif

{{-- start the editor using the id --}}
<div id="onix-grape">
    {{ $slot }}
</div>

{{-- Check if the push js empty if yes them just display it may not work correct so i recoment use the push --}}
@if (empty($pushLocationJs))
    {{-- pushh the css need for this plugisn to work  --}}
    <x-onix::GrapeBuilderJs
        saveUrl="{{ $saveUrl ?? null }}"
        loadUrl="{{ $loadUrl ?? null }}"
    />
@else
    @push($pushLocationJs)
        <x-onix::GrapeBuilderJs
            saveUrl="{{ $saveUrl ?? null }}"
            loadUrl="{{ $loadUrl ?? null }}"
        />
    @endpush
@endif
