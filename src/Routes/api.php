<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Onix\Controllers\OnixApiController;
use Mariojgt\Onix\Controllers\OnixApiDeployController;

// Check if the user can see the demo
if (config('onix.demo_enable') == true) {
    Route::group([
        'middleware' => ['onix-api'],
        'prefix' => 'onix-api',
    ], function () {
        // Onix controller
        Route::get('/config', [OnixApiController::class, 'config']);
        Route::get('/site-styles', [OnixApiController::class, 'getSiteStyles']);
        // Save pages
        Route::post('/save/page', [OnixApiController::class, 'savePage']);
        Route::get('/load/page/{slug}', [OnixApiController::class, 'loadPage']);
        // Saves Block
        Route::post('/save/block', [OnixApiController::class, 'saveBlock']);
        Route::get('/load/block/{slug}', [OnixApiController::class, 'loadBlock']);
        Route::get('/load/blocks', [OnixApiController::class, 'loadBlocks']);

        // Start deployment
        Route::post('/deploy/start', [OnixApiDeployController::class, 'startDeploy']);
        Route::get('/deploy/info', [OnixApiDeployController::class, 'readyDeployStatusFile']);
    });
}
