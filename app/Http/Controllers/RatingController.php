<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = Rating::with("pemesanan")->get();
        return view('admin.rating.index', compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $pemesanans = Pemesanan::all();
        return view('admin.rating.create', compact('users', 'pemesanans'));
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
            'pemesanan_id' => 'required',
            'user_id' => 'required',
            'rating' => 'required',
            'review' => 'required',
        ]);

        $ratings = new Rating();
        $ratings->pemesanan_id = $request->pemesanan_id;
        $ratings->villa_id = $ratings->pemesanan->villa_id;
        $ratings->user_id = $request->user_id;
        $ratings->rating = $request->rating;
        $ratings->review = $request->review;
        $ratings->save();
        return redirect()
            ->route('rating.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ratings = Rating::findOrFail($id);
        return view('admin.rating.show', compact('ratings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
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
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
