<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('/Admin')->group(function(){
    Route::get("/foods", [FoodsController::class, 'index'])->name('foods-index');
    Route::get("/foods/create", [FoodsController::class, 'create'])->name("food-create");
    Route::post('/foods/create', [FoodsController::class, 'store'])->name('food-store');
    Route::get('/foods/{food_id}', [FoodsController::class, 'show'])->name('food-show');
    Route::post('/foods/update/{food_id}', [FoodsController::class, 'update'])->name('food-update');
});
Route::get('/', function () {
    return view('Admin.index');
});
