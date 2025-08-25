<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function homepage () {
    return view('welcome');
}

public function contactUs(){
    return view('contattaci');
}

public function thankYou(){
    return view('thankYou');
}

public function booksList(){
    return view('books');
}

public function store(Request $request){
    
    
        $title= $request->title;
        $author= $request->author;
        $description= $request->description;
        $email= $request->mail;

        $book= new Book();
        $book->title=$title;
        $book->author=$author;
        $book->description=$description;
        $book->mail=$email;
        // dd($book);
    Mail::to($email)->send(new ContactMail($title, $author, $description, $email));
        $book->save();
        return redirect()->route('thankYou.page');
}
}
