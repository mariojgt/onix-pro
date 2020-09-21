<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Onix\Controllers\PageBuilderController;

// Setup controller
Route::group([
    'prefix'     => '',
    'middleware' => ['web']
], function () {
    //load the standad view
    Route::get('/onix/grape', [PageBuilderController::class , 'index'])->name('onix.grape');
    Route::get('/onix/ckeditor', [PageBuilderController::class , 'ckEditor'])->name('onix.ckeditor');
});
