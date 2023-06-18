<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BottleController;
use App\Http\Controllers\InventoryController;

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

Route::get('/products/productsbydate', [ProductController::class, 'indexByDate'])->name('inventories.productsByDate');
Route::resource('products', ProductController::class);

Route::resource('bottles', BottleController::class);

Route::get('/inventories/remove', [InventoryController::class, 'remove'])->name('inventories.remove');
Route::resource('inventories', InventoryController::class);
