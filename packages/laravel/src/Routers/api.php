<?php

use Laravel\Controllers\{
	TestController
};
use Illuminate\Support\Facades\Route;

Route::middleware(['jwt.verify',])->group(function () {

});

Route::prefix('tests')->group(function () {
    Route::get('/', [TestController::class, 'index']);
    Route::get('/{id}', [TestController::class, 'show']);
    Route::post('/', [TestController::class, 'store']);
    Route::put('/{id}', [TestController::class, 'update']);
    Route::delete('/{id}', [TestController::class, 'destroy']);
});
