@extends('layouts.admin')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Data Kabupaten/Kota</h4>
            <form class="forms-sample" action="{{ route('kota.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Kabupaten/Kota</label>
                    <input type="text" name="kota" class="form-control mb-2  @error('kota') is-invalid @enderror"
                        placeholder="Masukkan Kabupaten/Kota">
                    @error('kota')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mr-2">Kirim</button>
                <a href="/kota" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection