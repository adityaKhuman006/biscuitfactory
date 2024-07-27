<?php

use App\Http\Controllers\materialController;
use Illuminate\Support\Facades\Route;


Route::any('/', [materialController::class, 'index'])->name('index');

// Route::post('/create', [materialController::class, 'create'])->name('create');

Route::post('/product-add', [materialController::class, 'productAdd'])->name('product.add');
Route::put('/update-products', [materialController::class, 'update'])->name('update.products');

Route::get('/emp', [materialController::class, 'emp'])->name('emp');

Route::get('/choose', [materialController::class, 'choose'])->name('choose');

Route::get('/rep', [materialController::class, 'rep'])->name('rep');