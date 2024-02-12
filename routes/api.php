<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\DishController;
use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\API\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/dishes', [DishController::class, 'index']);
Route::get('/dish/{dish:id}', [DishController::class, 'show']);

Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurant/get/{restaurant:id}', [RestaurantController::class, 'get']);
Route::post('/restaurants/filter', [RestaurantController::class, 'filter']);

Route::get('/restaurant/{restaurant:slug}', [RestaurantController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
