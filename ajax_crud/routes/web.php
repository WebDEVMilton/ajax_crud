<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('products');
// });

// Route::get('/drop', [ProductController::class, 'crud']);
Route::get('/', [ProductController::class, 'products'])->name('products');
Route::post('/add-product', [ProductController::class, 'addProduct'])->name('add.product');
Route::post('/update-product', [ProductController::class, 'updateProduct'])->name('update.product');
Route::post('/delete-product', [ProductController::class, 'deleteProduct'])->name('delete.product');
Route::get('/pagination/paginate-data', [ProductController::class, 'pagination']);
Route::get('/search-product', [ProductController::class, 'searchProduct'])->name('search.product');
