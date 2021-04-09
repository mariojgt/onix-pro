<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Onix\Controllers\OnixContoller;

// Standard
Route::group([
    'middleware' => ['web']
], function () {
    // Onix controller
    Route::get('/onix/grape', [OnixContoller::class, 'index'])->name('onix/grape');
    // Save the data example
    Route::post('/onix/save', [OnixContoller::class, 'store'])->name('onix.save');
    // Load data Example
    Route::get('/onix/load', [OnixContoller::class, 'load'])->name('onix.load');
});
