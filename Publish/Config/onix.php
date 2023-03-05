<?php

return [
    'demo_enable'         => true,   // If true users can see the demo

    'request_token'  => env('VITE_ONIX_API_KEY'),   // Prevent the api unwanted requests

    /*
    |--------------------------------------------------------------------------
    | Onix block generator output path
    |--------------------------------------------------------------------------
    */
    'media_path'     => 'onix.media',    // The component looks
    'component_path' => 'onix.blocks',   // The blocks html content
    /*
    |--------------------------------------------------------------------------
    | Onix available editor color palette
    |--------------------------------------------------------------------------
    */
    'primary_color' => [
        '#000000ff',
        '#0d1b2aff',
        '#231942ff',
        '#01161eff',
        '#3d5a80ff',
        '#1f2041ff',
    ],
    'color_secondary' => [
        '#14213dff',
        '#1b263bff',
        '#5e548eff',
        '#124559ff',
        '#98c1d9ff',
        '#4b3f72ff',
        '#f7b267ff',
        '#f79d65ff',
        '#f4845fff',
        '#f27059ff',
        '#f25c54ff',
    ],
    'color_tertiary' => [
        '#fca311ff',
        '#415a77ff',
        '#9f86c0ff',
        '#598392ff',
        '#e0fbfcff',
        '#ffc857ff',
    ],
    'color_quaternary' => [
        '#e5e5e5ff',
        '#778da9ff',
        '#be95c4ff',
        '#aec3b0ff',
        '#ee6c4dff',
        '#119da4ff',
    ],

    /*
    |--------------------------------------------------------------------------
    | Onix editor css and js files
    |--------------------------------------------------------------------------
    */
    // Files base path (this is the location where the manifest.json file is located in the public folder)
    'use_cdn'          => false,
    'editor_base_path' => 'vendor/Onix',
    // The last name of you css file used in vite
    'editor_css' => [
        'app.css',
    ],
    // The last name of you js file used in vite
    'editor_js' => [
        'app.js',
    ],
    // If you want to use cdn instead of the local files you can add the cdn url here dont forget to change the use_cdn to true
    'editor_css_cdn' => [
        'https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css',
    ],
    'editor_js_cdn' => [
        'https://cdn.tailwindcss.com',
    ]
];
