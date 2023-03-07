<?php

namespace App\Http\Controllers;

use App\Models\Villa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MorevillaController extends Controller
{
    public function index()
    {
        $villas = Villa::with("lokasi")->get();
        return view('layout.user.morevilla', compact('villas'));
    }
}
