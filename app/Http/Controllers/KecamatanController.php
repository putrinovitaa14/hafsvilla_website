<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatans = Kecamatan::with("kota")->get();
        return view('admin.kecamatan.index', compact('kecamatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kotas = Kota::all();
        return view('admin.kecamatan.create', compact('kotas'));
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
            'kota_id' => 'required',
            'kecamatan' => 'required',
        ]);

        $kecamatans = new Kecamatan();
        $kecamatans->kota_id = $request->kota_id;
        $kecamatans->kecamatan = $request->kecamatan;
        $kecamatans->save();
        return redirect()
            ->route('kecamatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kotas = Kota::all();
        $kecamatans = Kecamatan::findOrFail($id);
        return view('admin.kecamatan.edit', compact('kecamatans','kotas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi
        $validated = $request->validate([
            'kota_id' => 'required',
            'kecamatan' => 'required',
        ]);

        $kecamatans = Kecamatan::findOrFail($id);
        $kecamatans->kota_id = $request->kota_id;
        $kecamatans->kecamatan = $request->kecamatan;
        $kecamatans->save();
        return redirect()
            ->route('kecamatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecamatans = Kecamatan::findOrFail($id);
        $kecamatans->delete();
        return redirect()
            ->route('kecamatan.index');
    }
}
