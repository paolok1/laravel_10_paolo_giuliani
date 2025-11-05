<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Providers\FortifyServiceProvider;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProductController;

Route::get('/', [ PublicController::class, 'homepage'])->name('home');

// Rotte ProductController
Route::post('/contattaci/submit', [ProductController::class, 'store'])->name('book-store')->middleware('auth');

// ProductController (CRUD)

Route::get('/product/create', [ProductController::class, 'create' ])->name('product.create')->middleware('auth');
Route::post('/product/store', [ProductController::class, 'store' ])->name('product.store')->middleware('auth');

Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');

Route::get('/product/show/{product}', [ProductController::class, 'show'])->name('product.show');

Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit')->middleware('auth');

Route::put('/product/update/{product}', [ProductController::class, 'update'])->name('product.update')->middleware('auth');

Route::delete('/product/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('auth');

Route::get('/product/my-products', [ProductController::class, 'myProducts'])->middleware('auth')->name('product.my');
