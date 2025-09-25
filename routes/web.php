<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Providers\FortifyServiceProvider;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProductController;

Route::get('/', [ PublicController::class, 'homepage'])->name('home');

Route::get('/create', [PublicController::class, 'contactUs'])->name('contact.us')->middleware('auth');

Route::post('/contattaci/submit', [ProductController::class, 'store'])->name('book-store')->middleware('auth');

// Route::get('/thank-you', [PublicController::class, 'thankYou'])->name('thankYou.page');

// Rotta pagina Books

Route::get('/books', [PublicController::class, 'booksList'])->name('books');

// Rotte ProductController
Route::get('/book/index', [ProductController::class, 'bookList'])->name('booksList')->middleware('auth');

// DetailController (CRUD)

Route::get('/detail/create', [DetailController::class, 'create' ])->name('detail.create')->middleware('auth');
Route::post('/detail/store', [DetailController::class, 'store' ])->name('detail.store')->middleware('auth');

Route::get('/detail/index', [DetailController::class, 'index'])->name('detail.index')->middleware('auth');

Route::get('/detail/show/{detail}', [DetailController::class, 'show'])->name('detail.show');

Route::get('/detail/edit/{detail}', [DetailController::class, 'edit'])->name('detail.edit');

Route::put('/detail/update/{detail}', [DetailController::class, 'update'])->name('detail.update');

Route::delete('/detail/delete/{detail}', [DetailController::class, 'destroy'])->name('detail.delete');