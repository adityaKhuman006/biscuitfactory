<?php

use App\Http\Controllers\materialController;
use Illuminate\Support\Facades\Route;


Route::get('/', [materialController::class, 'index'])->name('index');
Route::get('select-category', [materialController::class, 'selectCategory'])->name('select.category');

Route::get('admin', [materialController::class, 'admin'])->name('admin');
// Route::post('/create', [materialController::class, 'create'])->name('create');

Route::post('/product-add', [materialController::class, 'productAdd'])->name('product.add');
Route::get('/production', [materialController::class, 'production'])->name('production');
Route::post('/production-add', [materialController::class, 'productionAdd'])->name('production.add');

Route::get('/create', [materialController::class, 'create'])->name('create');
Route::delete('/products/{id}', [materialController::class, 'deleteProduct'])->name('products.delete');

// Route::get('/products-fatch', [materialController::class, 'index'])->name('products.fatch');
Route::get('/product/edit/{id}', [materialController::class, 'edit'])->name('product.edit');

Route::get('/choose', [materialController::class, 'choose'])->name('choose');
Route::get('/rep', [materialController::class, 'rep'])->name('rep');
Route::get('/view', [materialController::class, 'view'])->name('view');
Route::post('/product-update',[materialController::class,'productUpdate'])->name('product.update');
Route::post('get-production-data',[materialController::class,'getProductionData'])->name('get.production.data');
Route::post('get-material',[materialController::class,'getMaterial'])->name('get.material');
