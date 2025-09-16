<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details= Detail::all();
        return view('detail.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('detail.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title= $request->title;
        $description= $request->description;
        $body= $request->body;
        $img= $request->file('img')->store('public', 'img');


        Detail::create([
        'title' => $title,
        'description' => $description,
        'body' => $body,
        'img' => $img,
        ]);

        return redirect()->back()->with('message', 'libro inserito correttamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Detail $detail)
    {
        // dd($detail);
        return view('detail.show', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detail $detail)
    {
        //
    }
}
