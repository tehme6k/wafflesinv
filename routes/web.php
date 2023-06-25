<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BottleController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ReasonController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [TestController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/products/productsbydate', [ProductController::class, 'indexByDate'])->name('inventories.productsByDate');
Route::resource('products', ProductController::class);

Route::resource('bottles', BottleController::class);

Route::get('/inventories/remove', [InventoryController::class, 'remove'])->name('inventories.remove');
Route::resource('inventories', InventoryController::class);

Route::resource('reasons', ReasonController::class);
Route::resource('productions', ProductionController::class);





require __DIR__.'/auth.php';
