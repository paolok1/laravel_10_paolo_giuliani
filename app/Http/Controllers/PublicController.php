<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function homepage (){
    // $books = Book::all();
    return view('welcome');
    
}

public function contactUs(){
    return view('create');
}


// public function thankYou(){
//     return view('thankYou');
// }

public function booksList(){
    $books = Book::all();
    return view('books', ['books'=> $books]);
}


}
