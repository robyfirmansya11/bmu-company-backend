<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsController;

Route::get('/', function () {
    return view('welcome');

    
});

// Route::prefix('api')->group(function () {
//     Route::get('/news', [NewsController::class, 'index']);
//     Route::get('/news/{id}', [NewsController::class, 'show']);
// });
