<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kotas = Kota::latest()->get();
        return view('admin.kota.index', compact('kotas'));
        // $kotas = Kota::all();
        // return view('admin.kota.index', compact('kotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'kota' => 'required',
        ]);

        $kotas = new Kota();
        $kotas->kota = $request->kota;
        $kotas->save();
        return redirect()
            ->route('kota.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show(Kota $kota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kotas = Kota::findOrFail($id);
        return view('admin.kota.edit', compact('kotas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi
        $validated = $request->validate([
            'kota' => 'required',
        ]);

        $kotas = Kota::findOrFail($id);
        $kotas->kota = $request->kota;
        $kotas->save();
        return redirect()
            ->route('kota.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kotas = Kota::findOrFail($id);
        $kotas->delete();
        return redirect()
            ->route('kota.index');
    }
}
