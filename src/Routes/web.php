<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Onix\Controllers\PageBuilderController;

// Setup controller
Route::group([
    'prefix'     => '',
    'middleware' => ['web']
], function () {
    //load the standad view
    Route::get('/onix/page_builder', [PageBuilderController::class , 'index'])->name('onix.page_builder');
});
