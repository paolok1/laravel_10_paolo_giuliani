<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function store(BookRequest $request){
    
        // dd($request->all());
        $title= $request->title;
        $author= $request->author;
        $description= $request->description;
        $img = $request->file('img')->store('img');
        // dd($request->all());

        
        $book= new Book();
        $book->title=$title;
        $book->author=$author;
        $book->description=$description;
        $book->img=$img;
        // dd($book);
    // Mail::to($email)->send(new ContactMail($title, $author, $description, $email));
        $book->save();
        return redirect()->route('booksList')->with('success','libro inserito correttamente!');
}



    public function bookList(){
    $books = Book::all();
    return view('booksList', ['books'=> $books]);
}
}
