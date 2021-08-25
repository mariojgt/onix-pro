<?php

return [
    'demo_enable'         => true,   // If true users can see the demo

    /********************************************************************/
    // In here is where we load the javascript file compiled using webpack
    // The reason why is because you can complile you owm version so you can reference those files in here

    // Call main scripts you need this because is using the axios request
    'onix_app_js'         => '/vendor/Onix/js/app.js',
    // Call the Onix plugin preset
    'onix_onix_preset_js' => '/vendor/Onix/js/onixPreset.js',
    // Call Grape js code ditor plugin
    'grape_code_editor'   => '/vendor/Onix/js/grapeCodeEditor.js',
];
