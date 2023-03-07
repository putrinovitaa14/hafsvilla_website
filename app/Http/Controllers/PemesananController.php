<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanans = Pemesanan::with("user", "villa")->get();
        return view('admin.pemesanan.index', compact('pemesanans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $villas = Villa::all();
        return view('admin.pemesanan.create', compact('users', 'villas'));
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
            'user_id' => 'required',
            'villa_id' => 'required',
            'tanggal_masuk' => 'required|date_format:Y-m-d|before_or_equal:tanggal_keluar',
            'tanggal_keluar' => 'required|date_format:Y-m-d|after_or_equal:tanggal_masuk',
        ]);

        $existing_bookings = Pemesanan::where('villa_id', $request->villa_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('tanggal_masuk', [$request->tanggal_masuk, $request->tanggal_keluar])
                    ->orWhereBetween('tanggal_keluar', [$request->tanggal_masuk, $request->tanggal_keluar]);
            })
            ->get();

        if ($existing_bookings->count() > 0) {
            return redirect()
                ->back()
                ->with('error', 'Kamar tersebut sudah dipesan pada rentang tanggal yang diminta.');
        } else {
            $pemesanans = new Pemesanan();
            $kode_pemesanans = DB::table('pemesanans')->select(DB::raw('MAX(RIGHT(kode_pemesanan,3)) as kode'));
            if ($kode_pemesanans->count() > 0) {
                foreach ($kode_pemesanans->get() as $kode_pemesanan) {
                    $x = ((int) $kode_pemesanan->kode) + 1;
                    $kode = sprintf('%03s', $x);
                }
            } else {
                $kode = '001';
            }
            $pemesanans->kode_pemesanan = 'HFS-' . date('dmy') . $kode;
            $pemesanans->user_id = $request->user_id;
            $pemesanans->villa_id = $request->villa_id;
            $pemesanans->tanggal_masuk = $request->tanggal_masuk;
            $pemesanans->tanggal_keluar = $request->tanggal_keluar;
            $durasi = (strtotime($request->tanggal_keluar) / 60 / 60 / 24) - (strtotime($request->tanggal_masuk) / 60 / 60 / 24);
            $pemesanans->durasi = $durasi;
            $villa = Villa::findOrFail($pemesanans->villa_id);
            $pemesanans->total_harga = $durasi * $villa->harga;
            $pemesanans->save();
            return redirect()
                ->route('pemesanan.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
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
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemesanans = Pemesanan::findOrFail($id);
        $pemesanans->delete();
        return redirect()
            ->route('pemesanan.index');

    }
}
