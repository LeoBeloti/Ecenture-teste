<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategorysController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->name('admin')->group( function () {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('.home');

    Route::prefix('products')->group( function() {
    Route::get('/',                     [ProductsController::class, 'index'])->name('.index');
        Route::get('/register',         [ProductsController::class, 'create'])->name('.register');
        Route::post('/store',           [ProductsController::class, 'store'])->name('.store');
        Route::delete('/delete/{id}',   [ProductsController::class, 'destroy'])->name('.destroy');
        Route::delete('/delete/{id}',   [ProductsController::class, 'destroy'])->name('.destroy');
        Route::get('/edit/{id}',        [ProductsController::class, 'edit'])->name('.edit');
        Route::put('/update/{id}',      [ProductsController::class, 'update'])->name('.update');
        Route::match(["get","post"], '/import-xml',[ProductsController::class, 'dataImport'])->name('.import-xml'); 
    });

    Route::prefix('category')->name('.category')->group( function(){
        Route::get('/',                 [CategorysController::class, 'index'])->name('.index');
        Route::get('/create',           [CategorysController::class, 'create'])->name('.create');
        Route::post('/store',           [CategorysController::class, 'store'])->name('.store');
        Route::get('/edit/{id}',        [CategorysController::class, 'edit'])->name('.edit');
        Route::put('/update/{id}',      [CategorysController::class, 'update'])->name('.update');
        Route::delete('/delete/{id}',   [CategorysController::class, 'destroy'])->name('.destroy');
    });
});

