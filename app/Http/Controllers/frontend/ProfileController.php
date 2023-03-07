<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $pemesanan = Pemesanan::where('user_id', $user->id)->get();
        return view('layouts.user.profile', compact('user', 'pemesanan'));
    }

    public function rating(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required',
            'review' => 'required',
        ]);

        $ratings = new Rating();
        $ratings->pemesanan_id = $request->pemesanan_id;
        $ratings->villa_id = $ratings->pemesanan->villa_id;
        $ratings->user_id = auth()->user()->id;
        $ratings->rating = $request->rating;
        $ratings->review = $request->review;
        $ratings->save();
        return back();

    }

}
