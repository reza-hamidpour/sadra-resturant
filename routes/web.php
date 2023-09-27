<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FoodsController;
use App\Http\Controllers\Admin\FoodsTypeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MenuController;
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


Route::prefix('/admin')->middleware(['web', 'auth'])->namespace('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('Admin.index');
    })->name('dashboard');

    Route::get("/foods", [FoodsController::class, 'index'])->name('foods-index');
    Route::get("/foods/create", [FoodsController::class, 'create'])->name("food-create");
    Route::post('/foods/create', [FoodsController::class, 'store'])->name('food-store');
    Route::get('/foods/update/{food}', [FoodsController::class, 'show'])->name('food-show');
    Route::patch('/foods/update/{food}', [FoodsController::class, 'update'])->name('food-update');
    Route::get('/foods/delete/{food}', [FoodsController::class, 'destroy'])->name('food-destroy');

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

});

Route::get('/menu', [MenuController::class, 'index'])->name('menu');

//, 'auth'
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

