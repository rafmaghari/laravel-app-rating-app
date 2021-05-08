<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ItemCommentController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\RatingController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:api'], function() {
    Route::apiResource('/categories', CategoryController::class);
    Route::apiResource('/items', ItemController::class);
    Route::apiResource('/item-comments', ItemCommentController::class);
    Route::apiResource('/ratings', RatingController::class);
});
