<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Providers\FortifyServiceProvider;

Route::get('/', [ PublicController::class, 'homepage'])->name('home');

Route::get('/contattaci', [PublicController::class, 'contactUs'])->name('contact.us')->middleware('auth');

Route::post('/contattaci/submit', [ProductController::class, 'store'])->name('book-store');

// Route::get('/thank-you', [PublicController::class, 'thankYou'])->name('thankYou.page');

// Rotta pagina Books

Route::get('/books', [PublicController::class, 'booksList'])->name('books');

// Rotte ProductController
Route::get('/book/index', [ProductController::class, 'bookList'])->name('booksList');


