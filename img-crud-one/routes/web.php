<?php

use App\Http\Controllers\ImageCrudController;
use Illuminate\Support\Facades\Route;



Route::get('/', [ImageCrudController::class,'all_products'])->name('all.product');

Route::get('/add-new-product', [ImageCrudController::class,'add_new_product'])->name('add.product');
Route::post('/store-product', [ImageCrudController::class,'store_product'])->name('store.product');

Route::get('/edit-product/{id}', [ImageCrudController::class,'edit_product'])->name('edit.product');
Route::post('/update-product/{id}', [ImageCrudController::class,'update_product'])->name('update.product');
