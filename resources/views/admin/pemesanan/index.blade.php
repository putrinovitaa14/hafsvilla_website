@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data pemesanan</h4>
                {{-- <a href="{{ route('pemesanan.create') }}" class="btn btn-sm btn-primary" style="float: right"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>Tambah Data</a> --}}
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pemesanan</th>
                                <th>Costumer</th>
                                <th>Villa</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Keluar</th>
                                <th>Durasi</th>
                                <th>Total Harga</th>
                                {{-- <th>Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemesanans as $pemesanan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pemesanan->kode_pemesanan }}</td>
                                    <td>{{ $pemesanan->user->name }}</td>
                                    <td>{{ $pemesanan->villa->nama_villa }}</td>
                                    <td>{{ $pemesanan->tanggal_masuk }}</td>
                                    <td>{{ $pemesanan->tanggal_keluar }}</td>
                                    <td>{{ $pemesanan->durasi }} Hari</td>
                                    <td>Rp.{{ number_format($pemesanan->total_harga) }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
