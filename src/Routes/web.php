<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Onix\Controllers\OnixPageController;
use Mariojgt\Onix\Controllers\OnixBlockController;
use Mariojgt\Onix\Controllers\OnixDeployController;
use Mariojgt\Onix\Controllers\OnixSettingsController;
use Mariojgt\Onix\Controllers\OnixSitePageController;

Route::group([
    'middleware' => config('onix.middleware'),
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

    /*
    |--------------------------------------------------------------------------
    | Onix blocks controller
    |--------------------------------------------------------------------------
    */
    Route::get('/onix/block/index', [OnixBlockController::class, 'index'])->name('onix.block.index');
    Route::post('/onix/block/create', [OnixBlockController::class, 'store'])->name('onix.block.create');
    Route::post('/onix/block/edit/{block}', [OnixBlockController::class, 'edit'])->name('onix.block.edit');
    Route::delete('/onix/block/delete/{block}', [OnixBlockController::class, 'delete'])->name('onix.block.delete');
    Route::get('/onix/editor/block/{slug?}', [OnixBlockController::class, 'editor'])->name('onix.block.editor');

    // Settings blocks
    Route::get('/onix/settings', [OnixSettingsController::class, 'index'])->name('onix.settings');
    Route::post('/onix/settings', [OnixSettingsController::class, 'update'])->name('onix.settings');

    // Paged deploy page
    Route::get('/onix/deploy', [OnixDeployController::class, 'index'])->name('onix.deploy');
});

Route::group([
    'middleware' => ['web'],
], function () {
    /*
    |--------------------------------------------------------------------------
    | Onix website pages controller
    |--------------------------------------------------------------------------
    */
    Route::get(config('onix.route_prefix') . '{slug?}', [OnixSitePageController::class, 'index'])->name('onix.page');
});
