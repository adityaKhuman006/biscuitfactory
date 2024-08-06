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
// Route::get('/raw-material-out', [materialController::class, 'finishedgoodOut'])->name('finishedgood.out');



// raw-material 
Route::get('/raw-material-in', [materialController::class, 'RawMaterialIn'])->name('raw.material.in');
Route::get('/raw-material-out', [materialController::class, 'RawMaterialOut'])->name('raw.material.out');
Route::post('/raw-material-create', [materialController::class, 'RawMaterialCreate'])->name('raw.material.create');
Route::post('/raw-material-create-out', [materialController::class, 'RawMaterialCreateOut'])->name('raw.material.create.out');

// Packing-material
Route::get('/packing-material-in', [materialController::class, 'PackingMaterialIn'])->name('packing.material.in');
Route::get('/packing-material-out', [materialController::class, 'PackingMaterialOut'])->name('packing.material.out');
Route::post('/Packing-material-create', [materialController::class, 'PackingMaterialCreate'])->name('packing.material.create');
Route::post('/Packing-material-create-out', [materialController::class, 'PackingMaterialCreateOut'])->name('packing.material.create.out');

// machinery-material
Route::get('/machinery-material-in', [materialController::class, 'machineryMaterialIn'])->name('machinery.material.in');
Route::get('/machinery-material-out', [materialController::class, 'machineryMaterialOut'])->name('machinery.material.out');
Route::post('/machinery-material-create', [materialController::class, 'machineryMaterialCreate'])->name('machinery.material.create');
Route::post('/machinery-material-create-out', [materialController::class, 'machineryMaterialCreateOut'])->name('machinery.material.create.out');

// finishedgood-material
Route::get('/finished-good-in', [materialController::class, 'finishedgoodMaterialIn'])->name('finishedgood.material.in');
Route::get('/finished-good-out', [materialController::class, 'finishedgoodMaterialOut'])->name('finishedgood.material.out');
Route::post('/finishedgood-material-create', [materialController::class, 'finishedgoodMaterialCreate'])->name('finishedgood.material.create');
Route::post('/finishedgood-material-create-out', [materialController::class, 'finishedgoodMaterialCreateOut'])->name('finishedgood.material.create.out');


Route::get('/product-master', [materialController::class, 'productMaster'])->name('product.master');
Route::get('/transfer-material', [materialController::class, 'transferMaterial'])->name('transfer.material');
Route::get('/type-master', [materialController::class, 'typeMaster'])->name('type.master');
