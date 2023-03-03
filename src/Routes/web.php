<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Onix\Controllers\OnixPageController;

// Check if the user can see the demo
if (config('onix.demo_enable') == true) {
    Route::group([
        'middleware' => ['web'],
    ], function () {
        /*
        |--------------------------------------------------------------------------
        | Onix pages controller
        |--------------------------------------------------------------------------
        */
        Route::get('/onix/pages/index', [OnixPageController::class, 'index'])->name('onix.pages.index');
        Route::post('/onix/pages/create', [OnixPageController::class, 'store'])->name('onix.pages.create');
        Route::post('/onix/pages/edit/{page}', [OnixPageController::class, 'edit'])->name('onix.pages.edit');
        Route::delete('/onix/pages/delete/{page}', [OnixPageController::class, 'delete'])->name('onix.pages.delete');
        Route::get('/onix/editor/pages/{slug?}', [OnixPageController::class, 'editor'])->name('onix.pages.editor');
    });
}
