<?php

use App\Http\Controllers\FoodsBasketController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/cart/add', [FoodsBasketController::class, 'add_item'])->name('cart-add-item');
Route::post('/cart/remove', [FoodsBasketController::class, 'remove_item'])->name('cart-remove-item');
Route::get('/cart/', [FoodsBasketController::class, 'current_basket'])->name('cart-current');
