@extends('layouts.admin')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Image</h4>
                <form class="forms-sample" action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Villa</label>
                        <select name="villa_id" class="form-control mb-2  @error('villa_id') is-invalid @enderror">
                            @foreach ($villas as $villa)
                                <option value="{{$villa->id}}">{{$villa->nama_villa}}</option>
                            @endforeach
                        </select>
                        @error('villa_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="foto" class="form-control mb-2  @error('foto') is-invalid @enderror"
                            placeholder="foto">
                        @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Kirim</button>
                    <a href="/vills" class="btn btn-danger">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
