<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ItemCommentController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\RatingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('/categories', CategoryController::class);
Route::apiResource('/items', ItemController::class);
Route::apiResource('/item-comments', ItemCommentController::class);
Route::apiResource('/ratings', RatingController::class);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
