<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    public function booking(Request $request)
    {
        //validasi
        $validated = $request->validate([
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
                ->back()->with('error', 'Kamar tersebut sudah dipesan pada rentang tanggal yang diminta.');
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
            $pemesanans->user_id = auth()->user()->id;
            $pemesanans->villa_id = $request->villa_id;
            $pemesanans->tanggal_masuk = $request->tanggal_masuk;
            $pemesanans->tanggal_keluar = $request->tanggal_keluar;
            $durasi = (strtotime($request->tanggal_keluar) / 60 / 60 / 24) - (strtotime($request->tanggal_masuk) / 60 / 60 / 24);
            $pemesanans->durasi = $durasi;
            $villa = Villa::findOrFail($pemesanans->villa_id);
            $pemesanans->total_harga = $durasi * $villa->harga;
            $pemesanans->save();
            return redirect("/detailBooking/$pemesanans->id");
        }

    }

    public function detailBooking($id)
    {
        $pemesanans = Pemesanan::findOrFail($id);
        return view('layouts.user.detailBooking', compact('pemesanans'));

    }
}
