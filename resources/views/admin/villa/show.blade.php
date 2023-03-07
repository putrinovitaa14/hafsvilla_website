@extends('layouts.admin')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Data Villa</h4>
                <div class="form-group">
                    <label>Kabupaten/Kota</label>
                    <input type="text" name="kota_id"
                        class="form-control mb-2  @error('kota_id') is-invalid @enderror" placeholder="kota_id"
                        value="{{ $villas->kota->kota }}" readonly>
                    @error('kota_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="text" name="kecamatan_id"
                        class="form-control mb-2  @error('kecamatan_id') is-invalid @enderror" placeholder="kecamatan_id"
                        value="{{ $villas->kecamatan->kecamatan }}" readonly>
                    @error('kecamatan_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Villa</label>
                    <input type="text" name="nama_villa"
                        class="form-control mb-2  @error('nama_villa') is-invalid @enderror" placeholder="nama_villa"
                        value="{{ $villas->nama_villa }}" readonly>
                    @error('nama_villa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    {{-- <input type="text" name="desc" class="form-control mb-2  @error('desc') is-invalid @enderror"
                        placeholder="desc" value="{!! $villas->desc !!}" readonly> --}}
                        {!! $villas->desc !!}
                    @error('desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control mb-2  @error('harga') is-invalid @enderror"
                        placeholder="harga" value="{{ $villas->harga }}" readonly>
                    @error('harga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control mb-2  @error('alamat') is-invalid @enderror"
                        placeholder="alamat" value="{{ $villas->alamat }}" readonly>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mr-2">Kirim</button>
                <a href="/admin/villa" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        @foreach ($images as $image)
        <div class="col-6">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset($image->foto) }}" alt="Card image cap" />
                <div class="card-body">
                </div>
              </div>
            </div>
            @endforeach
    </div> --}}

    <div class="col-lg-5">
        <div class="card mb-4 shadow-lg overflow-scroll rounded card" style="height: 500px">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Data Image Villa</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="villa_id" value="{{ $villas->id }}">
                    <div class="mb-3">
                        <label class="form-label"></label>
                        @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </form>
                <div class="row mb-2">
                    @foreach ($images as $image)
                        <div class="col-md-6 col-lg-6 mb-4">
                            <div class="card h-100">
                                <img class="card-img-top" src="{{ asset($image->foto) }}" alt="Card image cap" />
                                <div class="card-body text-center">
                                    <form action="{{ route('image.destroy', $image->id) }}" method="post">
                                        @csrf

                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection
