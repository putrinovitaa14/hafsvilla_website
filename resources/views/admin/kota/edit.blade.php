@extends('layouts.admin')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Data Kota</h4>
                <form class="forms-sample" action="{{ route('kota.update', $kotas->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Nama Kota</label>
                        <input type="text" name="kota" class="form-control mb-2  @error('kota') is-invalid @enderror"
                            value="{{ $kotas->kota }}">
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
