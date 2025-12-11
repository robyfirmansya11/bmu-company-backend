<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\CareerController;


Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{slug}', [NewsController::class, 'show']);

Route::prefix('careers')->group(function () {
    Route::get('/', [CareerController::class, 'index']);
    Route::get('/{slug}', [CareerController::class, 'show']);
});