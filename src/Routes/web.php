<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Onix\Controllers\OnixController;

// Check if the user can see the demo
if (config('onix.demo_enable') == true) {
    Route::group([
        'middleware' => ['web'],
    ], function () {
        // Onix controller
        Route::get('/onix/index', [OnixController::class, 'index'])->name('onix.index');
        Route::get('/onix/editor/pages/{slug?}', [OnixController::class, 'editor'])->name('onix.editor');
    });
}
