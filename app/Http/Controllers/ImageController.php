<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Villa;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::with("villa")->get();
        return view('admin.image.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villas = Villa::all();
        return view('admin.image.create', compact('villas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'villa_id' => 'required',
            'foto' => 'required',
        ]);

        if ($request->hasfile('foto')) {
            foreach ($request->file('foto') as $image) {
                $name = rand(1000, 9999) . $image->getClientOriginalName();
                $image->move('images/villa/', $name);
                $images = new Image();
                $images->villa_id = $request->villa_id;
                $images->foto = 'images/villa/' . $name;
                $images->save();
            }
            return back()->with('success', 'Data has been added');
        }

        return redirect()
            ->route('image.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = Image::findOrFail($id);
        $images->deleteImage();
        $images->delete();

        return back();

    }
}
