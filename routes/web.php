<?php

use App\Http\Controllers\materialController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::any('/', [materialController::class, 'index'])->name('index');

Route::post('/create', [materialController::class, 'create'])->name('create');