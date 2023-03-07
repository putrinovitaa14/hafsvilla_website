@extends('layouts.admin')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Pemesanan</h4>
                <form class="forms-sample" action="{{ route('pemesanan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Costumer</label>
                        <select name="user_id" class="form-control mb-2  @error('user_id') is-invalid @enderror">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama Villa</label>
                        <select name="villa_id" class="form-control mb-2  @error('villa_id') is-invalid @enderror">
                            @foreach ($villas as $villa)
                                <option value="{{ $villa->id }}">{{ $villa->nama_villa }}</option>
                            @endforeach
                        </select>
                        @error('villa_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk"
                            class="form-control mb-2  @error('tanggal_masuk') is-invalid @enderror"
                            placeholder="tanggal_masuk">
                        @error('tanggal_masuk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tanggal Keluar</label>
                        <input type="date" name="tanggal_keluar"
                            class="form-control mb-2  @error('tanggal_keluar') is-invalid @enderror"
                            placeholder="tanggal_keluar">
                        @error('tanggal_keluar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Kirim</button>
                    <a href="/pemesanan" class="btn btn-danger">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
