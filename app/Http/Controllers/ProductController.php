<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function store(Request $request){
    
    
        $title= $request->title;
        $author= $request->author;
        $description= $request->description;
        

        $book= new Book();
        $book->title=$title;
        $book->author=$author;
        $book->description=$description;
        // dd($book);
    // Mail::to($email)->send(new ContactMail($title, $author, $description, $email));
        $book->save();
        return redirect()->route('home')->with('success','libro inserito correttamente!');
}



    public function bookList(){
    $books = Book::all();
    return view('book-list', ['books'=> $books]);
}
}
