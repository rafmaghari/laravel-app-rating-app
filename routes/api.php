<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ItemCommentController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\RatingController;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', [AuthController::class, 'login'])->name('login');
Route::post('auth/register', [AuthController::class, 'register'])->name('register');
Route::apiResource( '/items', ItemController::class);

Route::group(['middleware' => 'auth:api'], function() {
    Route::apiResource('/categories', CategoryController::class);
    Route::get('/items-top-rated', [ItemController::class, 'topTenRatedItem']);
    Route::apiResource('/item-comments', ItemCommentController::class);
    Route::apiResource('/ratings', RatingController::class);
});
