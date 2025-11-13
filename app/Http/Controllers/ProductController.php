<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
    request()->validate([
    'title' => 'required|min:3|max:255',
    'description' => 'required|max:500',
    'body' => 'required',
    'img' => 'nullable|image|max:2048'
],
[
    'title.required' => 'Il titolo è obbligatorio!',
    'title.min' => 'Il titolo deve avere almeno 3 caratteri!',
    'description.required' => 'La descrizione è obbligatoria!',
    'body.required' => 'Nome autore obbligatorio!', 
    'img.image' => 'Il file deve essere un\'immagine valida!',
    'img.max' => 'L\'immagine non può superare i 2MB!'
]);





       $product = Product::create([
        'title' => $request->title,
        'description' => $request->description,
        'body' => $request->body,
        'user_id'=> Auth::user()->id
        ]);
        if ($request->file('img')) {
            $product->img = $request->file('img')->store('img', 'public');
            
        }else{
            $product->img = 'img/default-png';
        }

        $product->save();
        

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

        if($request->file('img')){
            Storage::disk('public')->delete($product->img);
            $request->validate(['img' => 'image']);
            $product->update([$product->img = $request->file('img')->store('img', 'public')
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
    $products = Auth::user()->products;
    return view('product.my_products', compact('products'));
}


}
