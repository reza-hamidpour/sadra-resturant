<?php

use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FoodsController;
use App\Http\Controllers\Admin\FoodsTypeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Admin\UsersController;
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

require __DIR__.'/auth.php';




Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');


Route::prefix('/admin')->middleware(['web', 'auth', 'can:admin-panel'])->namespace('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('Admin.index');
    })->name('dashboard');

    Route::get("/foods", [FoodsController::class, 'index'])->middleware('can:foods-create', 'can:foods-list')->name('foods-index');
    Route::get("/foods/create", [FoodsController::class, 'create'])->name("food-create")->middleware('can:foods-create');
    Route::post('/foods/create', [FoodsController::class, 'store'])->name('food-store')->middleware('can:foods-create');
    Route::get('/foods/update/{food}', [FoodsController::class, 'show'])->name('food-show')->middleware('can:foods-update');
    Route::patch('/foods/update/{food}', [FoodsController::class, 'update'])->name('food-update')->middleware('can:foods-update');
    Route::get('/foods/delete/{food}', [FoodsController::class, 'destroy'])->name('food-destroy')->middleware('can:foods-destroy');

    Route::get('/foods_type', [FoodsTypeController::class, 'index'])->name('foods_type');
    Route::get('/foods_type/create', [FoodsTypeController::class, 'create'])->name('foods_type_create');
    Route::post('/foods_type/create', [FoodsTypeController::class, 'store'])->name('foods_type_store');
    Route::get('/foods_type/update/{food_type}', [FoodsTypeController::class, 'show'])->name('foods_type_edit');
    Route::patch('/foods_type/update/{food_type}', [FoodsTypeController::class, 'update'])->name('foods_type_update');
    Route::get('/foods_type/delete/{food_type}', [FoodsTypeController::class, 'destroy'])->name('foods_type_destroy');

    Route::get('/gallery', [\App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('gallery-index');
    Route::get('/gallery/create', [\App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('gallery-create');
    Route::post('/gallery/create', [\App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('gallery-store');
    Route::get('/gallery/{gallery}/edit', [\App\Http\Controllers\Admin\GalleryController::class, 'edit'])->name('gallery-edit');
    Route::patch('/gallery/{gallery}/edit', [\App\Http\Controllers\Admin\GalleryController::class,'update'])->name('gallery-update');
    Route::get('/gallery/{gallery}/delete', [\App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('gallery-destroy');

    Route::get('/links', [\App\Http\Controllers\Admin\HeadMenuController::class, 'index'])->name('links_index');
    Route::get('/links/create', [\App\Http\Controllers\Admin\HeadMenuController::class, 'create'])->name('links_create');
    Route::post('/links/create', [\App\Http\Controllers\Admin\HeadMenuController::class,'store'])->name('links_store');
    Route::get('/links/{link}/edit', [\App\Http\Controllers\Admin\HeadMenuController::class, 'edit'])->name('links_edit');
    Route::put('/links/{link}/edit', [\App\Http\Controllers\Admin\HeadMenuController::class, 'update'])->name('links_update');
    Route::get('/links/{link}/delete', [\App\Http\Controllers\Admin\HeadMenuController::class, 'destroy'])->name('links_destroy');

    Route::get('/users/roles', [RolesController::class, 'index'])->name('roles.index');
    Route::get('/users/roles/{role}/edit', [RolesController::class, 'show'])->name('roles.edit');
    Route::patch('/users/roles/{role}/edit', [RolesController::class, 'update'])->name('roles.update');
    Route::get('/users/roles/create', [RolesController::class, 'create'])->name('roles.create');
    Route::post('/users/roles/create', [RolesController::class, 'store'])->name('roles.store');
    Route::get('/users/roles/{role}/delete', [RolesController::class, 'destroy'])->name('roles.destroy');

    Route::get('/users', [UsersController::class, 'index'])->name('users.index')->middleware(['can:permission-list', 'can:permission-update', 'can:permission-create', 'can:permission-destroy']);
    Route::get('/users/{user}/edit', [UsersController::class, 'show'])->name('users.edit')->middleware(['can:permission-update']);
    Route::patch('/users/{user}/edit', [UsersController::class, 'update'])->name('users.update')->middleware(['can:permission-update']);
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create')->middleware(['can:permission-create']);
    Route::post('/users/create', [UsersController::class, 'store'])->name('users.store')->middleware(['can:permission-create']);
    Route::delete('/users/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy')->middleware(['can:permission-destroy']);


});

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery-archive');
Route::get('/gallery/{gallery}', [GalleryController::class, 'single'])->name('gallery-single');
Route::get('/reservation', [\App\Http\Controllers\ReservationController::class, 'index'])->name('reservation');

Route::get("/dashboard", [\App\Http\Controllers\UserProfileControler::class, 'index'])->name('user_profile');
Route::patch('/dashboard', [\App\Http\Controllers\UserProfileControler::class, 'info_update'])->name('user_information_update');

//, 'auth'
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

