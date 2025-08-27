<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function homepage () {
    $books = Book::all();
    return view('welcome', ['books'=> $books]);
    
}

public function contactUs(){
    return view('contattaci');
}


// public function thankYou(){
//     return view('thankYou');
// }

public function booksList(){
    return view('books');
}


}
