<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Onix\Controllers\HomeContoller;
use Mariojgt\Onix\Controllers\DashboardController;
use Mariojgt\Onix\Controllers\Auth\LoginController;

// Standard
Route::group([
    'middleware' => ['web']
], function () {
    // example page not required to be login
    Route::get('/onix/grape', [HomeContoller::class, 'index'])->name('onix/grape');
});
