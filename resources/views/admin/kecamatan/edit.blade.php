@extends('layouts.admin')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data Kecamatan</h4>
            <form class="forms-sample" action="{{ route('kecamatan.update', $kecamatans->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Nama Kabupaten/Kota</label>
                    <select name="kota_id" class="form-control mb-2  @error('kota_id') is-invalid @enderror">
                        @foreach ($kotas as $kota)
                        <option value="{{ $kota->id }}">{{ $kota->kota }}</option>
                        @endforeach
                    </select>
                    @error('kota_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Kecamatan</label>
                    <input type="text" name="kecamatan"
                        class="form-control mb-2  @error('kecamatan') is-invalid @enderror"
                        value="{{ $kecamatans->kecamatan }}">
                    @error('kecamatan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mr-2">Kirim</button>
                <a href="/kecamatan" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection