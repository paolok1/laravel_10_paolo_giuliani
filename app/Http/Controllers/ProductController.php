<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Requests\ProductEditRequest;

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


 public function index()
    {
        $products= Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeDetail(Request $request)
    {
        // $title= $request->$title;
        // $description= $request->$description;
        // $body= $request->$body;
        // $img= $request->file('img')->store('img', 'public');


        Product::create([
        'title' => $request->title,
        'description' => $request->description,
        'body' => $request->body,
        'img' => $request->file('img')->store('img', 'public')
        ]);
        // dd($request->all());

        return redirect()->back()->with('message', 'libro inserito correttamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // dd($detail);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductEditRequest $request, Product $product)
    {
        $product->update([
            $product->title = $request->title,
            $product->description = $request->description,
            $product->body = $request->body,
        ]);
        if($request->img){
            $request->validate(['img' => 'image']);
            $product->update([
                $product->img = $request->file('img')->store('img', 'public')
            ]);
        }
        return redirect()->back()->with('message', 'Hai modificato correttamente il libro!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/product/index')->with('message', 'Hai eliminato correttamente il libro!');
    }

}
