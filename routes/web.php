<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Providers\FortifyServiceProvider;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProductController;

Route::get('/', [ PublicController::class, 'homepage'])->name('home');

Route::get('/create', [PublicController::class, 'contactUs'])->name('contact.us')->middleware('auth');

// Rotte ProductController
Route::post('/contattaci/submit', [ProductController::class, 'store'])->name('book-store')->middleware('auth');

Route::get('/book/index', [ProductController::class, 'bookList'])->name('booksList')->middleware('auth');

// DetailController (CRUD)

Route::get('/product/create', [ProductController::class, 'create' ])->name('product.create')->middleware('auth');
Route::post('/product/store', [ProductController::class, 'storeDetail' ])->name('product.store')->middleware('auth');

Route::get('/product/index', [ProductController::class, 'index'])->name('product.index')->middleware('auth');

Route::get('/product/show/{product}', [ProductController::class, 'show'])->name('product.show');

Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');

Route::put('/product/update/{product}', [ProductController::class, 'update'])->name('product.update');

Route::delete('/product/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');