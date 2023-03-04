<?php

return [
    'demo_enable'         => true,   // If true users can see the demo

    'request_token'  => env('VITE_ONIX_API_KEY'),   // Prevent the api unwanted requests
    /*
    |--------------------------------------------------------------------------
    | Onix Component autoload path variables
    |--------------------------------------------------------------------------
    */
    'media_path'     => 'onix.media',    // The component looks
    'component_path' => 'onix.blocks',   // The blocks html content
];
