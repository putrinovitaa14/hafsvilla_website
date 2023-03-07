<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Image;
use App\Models\Villa;
use App\Models\Lokasi;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villas = Villa::with("kota","kecamatan")->get();
        return view('admin.villa.index', compact('villas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kotas = Kota::all();
        $kecamatans = Kecamatan::all();
        return view('admin.villa.create', compact('kotas', 'kecamatans'));
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
            'kota_id' => 'required',
            'kecamatan_id' => 'required',
            'nama_villa' => 'required',
            'desc' => 'required',
            'harga' => 'required',
            'alamat' => 'required',
        ]);

        $villas = new Villa();
        $villas->kota_id = $request->kota_id;
        $villas->kecamatan_id = $request->kecamatan_id;
        $villas->nama_villa = $request->nama_villa;
        $villas->desc = $request->desc;
        $villas->harga = $request->harga;
        $villas->alamat = $request->alamat;
        $villas->save();

        if ($request->hasfile('foto')) {
            foreach ($request->file('foto') as $image) {
                $name = rand(1000, 9999) . $image->getClientOriginalName();
                $image->move('images/villa/', $name);
                $images = new Image();
                $images->villa_id = $villas->id;
                $images->foto = 'images/villa/' . $name;
                $images->save();
            }
        }

        return redirect()
            ->route('villa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Villa  $villa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $villas = Villa::findOrFail($id);
        $images = Image::where('villa_id', $villas->id)->get();
        return view('admin.villa.show', compact('villas', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Villa  $villa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kotas = Kota::all();
        $kecamatans = Kecamatan::all();
        $villas = Villa::findOrFail($id);
        $images = Image::where('villa_id', $villas->id)->get();
        return view('admin.villa.edit', compact('villas', 'kotas', 'kecamatans', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Villa  $villa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kota_id' => 'required',
            'kecamatan_id' => 'required',
            'nama_villa' => 'required',
            'desc' => 'required',
            'harga' => 'required',
            'alamat' => 'required',
        ]);

        $villas = Villa::findOrFail($id);
        $villas->kota_id = $request->kota_id;
        $villas->kecamatan_id = $request->kecamatan_id;
        $villas->nama_villa = $request->nama_villa;
        $villas->desc = $request->desc;
        $villas->harga = $request->harga;
        $villas->alamat = $request->alamat;
        $villas->save();
        return redirect()
            ->route('villa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Villa  $villa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $villas = Villa::findOrFail($id);
        $images = Image::where('villa_id', $id)->get();
        foreach ($images as $image) {
            $image->deleteImage();
            $image->delete();
        }

        $villas->delete();
        return redirect()
            ->route('villa.index');
    }
}





// awal
// <?php

// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use App\Models\Image;
// use App\Models\Lokasi;
// use App\Models\Villa;
// use Illuminate\Http\Request;

// class VillaController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         $villas = Villa::with("lokasi")->get();
//         return view('admin.villa.index', compact('villas'));

//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         $lokasis = Lokasi::all();
//         return view('admin.villa.create', compact('lokasis'));
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'lokasi_id' => 'required',
//             'nama_villa' => 'required',
//             'desc' => 'required',
//             'harga' => 'required',
//             'alamat' => 'required',
//         ]);

//         $villas = new Villa();
//         $villas->lokasi_id = $request->lokasi_id;
//         $villas->nama_villa = $request->nama_villa;
//         $villas->desc = $request->desc;
//         $villas->harga = $request->harga;
//         $villas->alamat = $request->alamat;
//         $villas->save();

//         if ($request->hasfile('foto')) {
//             foreach ($request->file('foto') as $image) {
//                 $name = rand(1000, 9999) . $image->getClientOriginalName();
//                 $image->move('images/villa/', $name);
//                 $images = new Image();
//                 $images->villa_id = $villas->id;
//                 $images->foto = 'images/villa/' . $name;
//                 $images->save();
//             }
//         }

//         return redirect()
//             ->route('villa.index');
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Models\Villa  $villa
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         $villas = Villa::findOrFail($id);
//         $images = Image::where('villa_id', $villas->id)->get();
//         return view('admin.villa.show', compact('villas', 'images'));
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Models\Villa  $villa
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         $lokasis = Lokasi::all();
//         $villas = Villa::findOrFail($id);
//         $images = Image::where('villa_id', $villas->id)->get();
//         return view('admin.villa.edit', compact('villas', 'lokasis', 'images'));
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Models\Villa  $villa
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         $validated = $request->validate([
//             'lokasi_id' => 'required',
//             'nama_villa' => 'required',
//             'desc' => 'required',
//             'harga' => 'required',
//             'alamat' => 'required',
//         ]);

//         $villas = Villa::findOrFail($id);
//         $villas->lokasi_id = $request->lokasi_id;
//         $villas->nama_villa = $request->nama_villa;
//         $villas->desc = $request->desc;
//         $villas->harga = $request->harga;
//         $villas->alamat = $request->alamat;
//         $villas->save();
//         return redirect()
//             ->route('villa.index');
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Models\Villa  $villa
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         $villas = Villa::findOrFail($id);
//         $images = Image::where('villa_id', $id)->get();
//         foreach ($images as $image) {
//             $image->deleteImage();
//             $image->delete();
//         }

//         $villas->delete();
//         return redirect()
//             ->route('villa.index');
//     }
// }


