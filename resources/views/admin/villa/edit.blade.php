@extends('layouts.admin')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data Villa</h4>
            <form class="forms-sample" action="{{ route('villa.update', $villas->id) }}" method="POST">
                @csrf
                @method('put')
                {{-- <div class="form-group">
                    <label>Lokasi</label>
                    <select name="lokasi_id" class="form-control mb-2  @error('lokasi_id') is-invalid @enderror">
                        @foreach ($lokasis as $lokasi)
                        <option value="{{ $lokasi->id }}">{{ $lokasi->lokasi }}</option>
                        @endforeach
                    </select>
                    @error('lokasi_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> --}}

                <div class="form-group">
                    <label>Kabupaten/Kota</label>
                    <select name="kota_id" class="form-control mb-2  @error('kota_id') is-invalid @enderror">
                        @foreach ($kotas as $kota)
                        {{-- <option value="{{ $kota->id }}">{{ $kota->kota }}</option> --}}
                        @if (old('kota_id', $kota->id) == $villas->kota_id)
                        <option value="{{ $kota->id }}" selected>
                            {{ $kota->kota }}</option>
                        @else
                        <option value="{{ $kota->id }}">{{ $kota->kota }}
                        </option>
                        @endif
                        @endforeach
                    </select>
                    @error('kota_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Kecamatan</label>
                    <select name="kecamatan_id" class="form-control mb-2  @error('kecamatan_id') is-invalid @enderror">
                        @foreach ($kecamatans as $kecamatan)
                        {{-- <option value="{{ $kecamatan->id }}">{{ $kecamatan->kecamatan }}</option> --}}
                        @if (old('kecamatan_id', $kecamatan->id) == $villas->kecamatan_id)
                        <option value="{{ $kecamatan->id }}" selected>
                            {{ $kecamatan->kecamatan }}</option>
                        @else
                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->kecamatan }}
                        </option>
                        @endif
                        @endforeach
                    </select>
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
                        value="{{ $villas->nama_villa }}">
                    @error('nama_villa')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input id="desc" value="{!! $villas->desc !!}" type="hidden" name="desc">
                    <trix-editor input="desc"></trix-editor>
                    @error('desc')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control mb-2  @error('harga') is-invalid @enderror"
                        placeholder="harga" value="{{ $villas->harga }}">
                    @error('harga')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control mb-2  @error('alamat') is-invalid @enderror"
                        placeholder="alamat" value="{{ $villas->alamat }}">
                    @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mr-2">Kirim</button>
                <a href="/admin/villa" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card mb-4 shadow-lg overflow-scroll rounded card" style="height: 400px">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Image Villa</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="villa_id" value="{{ $villas->id }}">
                <div class="mb-3">
                    <label class="form-label">Galeri Fasilitas</label>
                    <input type="file" class="form-control mb-2  @error('foto') is-invalid @enderror" name="foto[]"
                        value="{{ old('foto') }}" multiple>
                    @error('foto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <button type="submit" class="btn btn-primary mr-2">Kirim</button>
                </div>
            </form>
            <div class="row">
                @foreach ($images as $image)
                <div class="col-md-2 col-lg-2 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ asset($image->foto) }}" alt="Card image cap" />
                        <div class="card-body text-center">
                            <form action="{{ route('image.destroy', $image->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalCente"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </button>
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