<?php

use App\Http\Controllers\materialController;
use Illuminate\Support\Facades\Route;


Route::any('/', [materialController::class, 'index'])->name('index');

// Route::post('/create', [materialController::class, 'create'])->name('create');

Route::post('/product-add', [materialController::class, 'productAdd'])->name('product.add');
Route::put('/update-products', [materialController::class, 'update'])->name('update.products');

Route::get('/production', [materialController::class, 'production'])->name('production');
Route::post('/production-add', [materialController::class, 'productionAdd'])->name('production.add');


Route::get('/create', [materialController::class, 'create'])->name('create');
Route::delete('/products/{id}', [materialController::class, 'deleteProduct'])->name('products.delete');

// Route::get('/products-fatch', [materialController::class, 'index'])->name('products.fatch');
Route::get('/product/edit/{id}', [materialController::class, 'edit'])->name('product.edit');
Route::post('/product/update', [materialController::class, 'update'])->name('product.update');


Route::get('/choose', [materialController::class, 'choose'])->name('choose');
Route::get('/rep', [materialController::class, 'rep'])->name('rep');
Route::get('/view', [materialController::class, 'view'])->name('view');