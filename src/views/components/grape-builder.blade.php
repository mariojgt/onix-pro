{{-- Check if the push css empty if yes them just display it may not work correct so i recoment use the push --}}
@if (empty($pushLocationCss))
    {{-- pushh the css need for this plugisn to work  --}}
    <x-onix::builder-css
        mainBackgroudColor="{{ $mainBackgroudColor ?? '#000000' }}"
        textColor="{{ $textColor ?? '#ffffff' }}"
    />
@else
    @push($pushLocationCss)
        {{-- pushh the css need for this plugisn to work  --}}
        <x-onix::builder-css
            mainBackgroudColor="{{ $mainBackgroudColor ?? '#000000' }}"
            textColor="{{ $textColor ?? '#ffffff' }}"
        />
    @endpush
@endif

{{-- the floating icons --}}
<a href="#" onclick="saveContent()" class="float">
    <svg class="svg-icon my-float" viewBox="0 0 20 20">
        <path d="M17.896,12.706v-0.005v-0.003L15.855,2.507c-0.046-0.24-0.255-0.413-0.5-0.413H4.899c-0.24,0-0.447,0.166-0.498,0.4L2.106,12.696c-0.008,0.035-0.013,0.071-0.013,0.107v4.593c0,0.28,0.229,0.51,0.51,0.51h14.792c0.28,0,0.51-0.229,0.51-0.51v-4.593C17.906,12.77,17.904,12.737,17.896,12.706 M5.31,3.114h9.625l1.842,9.179h-4.481c-0.28,0-0.51,0.229-0.51,0.511c0,0.703-1.081,1.546-1.785,1.546c-0.704,0-1.785-0.843-1.785-1.546c0-0.281-0.229-0.511-0.51-0.511H3.239L5.31,3.114zM16.886,16.886H3.114v-3.572H7.25c0.235,1.021,1.658,2.032,2.75,2.032c1.092,0,2.515-1.012,2.749-2.032h4.137V16.886z"></path>
    </svg>
</a>
<div class="label-container">
    <div class="label-text">Save Page</div>
    <i data-feather="circle"></i>
</div>


{{-- start the editor using the id --}}
<div id="onix-grape">
    {{ $slot }}
</div>

{{-- Check if the push js empty if yes them just display it may not work correct so i recoment use the push --}}
@if (empty($pushLocationJs))
    {{-- pushh the css need for this plugisn to work  --}}
    <x-onix::grape-builder-js
        saveUrl="{{ $saveUrl ?? null }}"
        loadUrl="{{ $loadUrl ?? null }}"
        plugin="{{ $plugin ?? 'onixPlugins' }}"
        imageLoadApi="{{ $imageLoadApi ?? '' }}"
        imageSaveApi="{{ $imageSaveApi ?? '' }}"
        cssPath="{{ $cssPath ?? '' }}"
    >
    {{ $pluginJs ?? '' }}
    </x-onix::grape-builder-js>
@else
    @push($pushLocationJs)
        <x-onix::grape-builder-js
            saveUrl="{{ $saveUrl ?? null }}"
            loadUrl="{{ $loadUrl ?? null }}"
            plugin="{{ $plugin ?? 'onixPlugins' }}"
            imageLoadApi="{{ $imageLoadApi ?? '' }}"
            imageSaveApi="{{ $imageSaveApi ?? '' }}"
            cssPath="{{ $cssPath ?? '' }}"
        >
        {{ $pluginJs ?? '' }}
        </x-onix::grape-builder-js>
    @endpush
@endif
