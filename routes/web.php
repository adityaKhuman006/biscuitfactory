<?php

use App\Http\Controllers\materialController;
use Illuminate\Support\Facades\Route;


Route::any('/', [materialController::class, 'index'])->name('index');

Route::post('/create', [materialController::class, 'create'])->name('create');

Route::get('/emp', [materialController::class, 'emp'])->name('emp');

Route::get('/choose', [materialController::class, 'choose'])->name('choose');

Route::get('/report', [materialController::class, 'report'])->name('report');