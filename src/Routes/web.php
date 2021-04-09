<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Onix\Controllers\OnixContoller;

// Standard
Route::group([
    'middleware' => ['web']
], function () {
    // Example page not required to be login
    Route::get('/onix/grape', [OnixContoller::class, 'index'])->name('onix/grape');
});
