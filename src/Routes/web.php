<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Onix\Controllers\OnixContoller;

// Check if the user can see the demo
if (config('onix.demo_enable') == true) {
    Route::group([
        'middleware' => ['web'],
    ], function () {
        // Onix controller
        Route::get('/onix/grape', [OnixContoller::class, 'index'])->name('onix.grape');
        // Save the data example
        Route::post('/onix/save', [OnixContoller::class, 'store'])->name('onix.save');
        // Load data Example
        Route::get('/onix/load', [OnixContoller::class, 'load'])->name('onix.load');
        // Load Image example
        Route::get('/onix/image/imageload', [OnixContoller::class, 'imageLoad'])->name('onix.image.load');
        // Save Image example
        Route::post('/onix/image/imagesave', [OnixContoller::class, 'imageSave'])->name('onix.image.save');
        // Example load component realtime from api
        Route::get('/onix/component-load', [OnixContoller::class, 'autoLoadComponent'])->name('onix.component.load');
    });
}
