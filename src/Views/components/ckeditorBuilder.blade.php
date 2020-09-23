{{-- start the editor using the id --}}
<textarea id="editor" name="{{ $name ?? 'ckEditor' }}" >
    {{ $slot }}
</textarea>

{{-- Check if the push js empty if yes them just display it may not work correct so i recoment use the push --}}
@if (empty($pushLocationJs))
    {{-- pushh the css need for this plugisn to work  --}}
    <x-onix::CkeditorBuilderJs />
@else
    @push($pushLocationJs)
        <x-onix::CkeditorBuilderJs />
    @endpush
@endif
