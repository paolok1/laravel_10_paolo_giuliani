<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailEditRequest;
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
        // $title= $request->$title;
        // $description= $request->$description;
        // $body= $request->$body;
        // $img= $request->file('img')->store('img', 'public');


        Detail::create([
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
        return view('detail.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DetailEditRequest $request, Detail $detail)
    {
        $detail->update([
            $detail->title = $request->title,
            $detail->description = $request->description,
            $detail->body = $request->body,
        ]);
        if($request->img){
            $request->validate(['img' => 'image']);
            $detail->update([
                $detail->img = $request->file('img')->store('img', 'public')
            ]);
        }
        return redirect()->back()->with('message', 'Hai modificato correttamente il libro!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detail $detail)
    {
        $detail->delete();
        return redirect()->back()->with('message', 'Hai eliminato correttamente il libro!');
    }
}
