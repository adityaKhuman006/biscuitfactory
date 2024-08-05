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
Route::post('/product-update', [materialController::class, 'productUpdate'])->name('product.update');
Route::post('get-production-data', [materialController::class, 'getProductionData'])->name('get.production.data');
Route::post('get-material', [materialController::class, 'getMaterial'])->name('get.material');
Route::get('/security', [materialController::class, 'security'])->name('security');
Route::get('/getin', [materialController::class, 'getin'])->name('getin');
Route::get('/getout', [materialController::class, 'getout'])->name('getout');
Route::get('/raw-material-in', [materialController::class, 'rawmaterialIn'])->name('rawmaterial.in');
Route::get('/packing-material-in', [materialController::class, 'packingmaterialIn'])->name('packingmaterial.in');
Route::get('/machinery-items-in', [materialController::class, 'machineryitemsIn'])->name('machineryitems.in');
Route::get('/finished-good-in', [materialController::class, 'finishedgoodIn'])->name('finishedgood.in');
// Route::get('/raw-material-out', [materialController::class, 'finishedgoodOut'])->name('finishedgood.out');
Route::get('/raw-material-out', [materialController::class, 'rawmaterialOut'])->name('rawmaterial.out');
Route::get('/packing-material-out', [materialController::class, 'packingmaterialOut'])->name('packingmaterial.out');
Route::get('/machinery-items-out', [materialController::class, 'machineryitemsOut'])->name('machineryitems.out');
Route::get('/finished-good-out', [materialController::class, 'finishedgoodOut'])->name('finishedgood.out');
