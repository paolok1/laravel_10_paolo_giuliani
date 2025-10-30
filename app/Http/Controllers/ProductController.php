<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductEditRequest;

class ProductController extends Controller
{
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
    public function store(Request $request)
    {
        // $title= $request->$title;
        // $description= $request->$description;
        // $body= $request->$body;
        // $img= $request->file('img')->store('img', 'public');


       $product = Product::create([
        'title' => $request->title,
        'description' => $request->description,
        'body' => $request->body,
        'user_id'=> Auth::user()->id
        ]);
        if ($request->file('img')) {
            $product->img = $request->file('img')->store('img', 'public');
            $product->save();
        }
        // dd($request->all());

        return redirect()->back()->with('message', 'libro inserito correttamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
       if ($product->user_id !== Auth::id()) {
        abort(403, 'Non sei autorizzato a visualizzare questo libro.');
    }

    return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
            if ($product->user_id !== Auth::id()) {
            abort(403, 'Non sei autorizzato a modificare questo libro.');
    }
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
        return redirect()->route('product.index')->with('message', 'Hai eliminato correttamente il libro!');
    }

    public function myProducts()
{
    $products = Product::where('user_id', Auth::id())->get();
    return view('product.my_products', compact('products'));
}


}
