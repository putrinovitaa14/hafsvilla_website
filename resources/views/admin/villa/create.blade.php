@extends('layouts.admin')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Villa</h4>
                <form class="forms-sample" action="{{ route('villa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                        <select name="kota_id" id="kota" class="form-control mb-2  @error('kota_id') is-invalid @enderror">
                            @foreach ($kotas as $kota)
                                <option value="" hidden>Pilih Kabupaten/Kota</option>
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
                        <label>Kecamatan</label>
                        <select name="kecamatan_id" id="kecamatan" class="form-control mb-2  @error('kecamatan_id') is-invalid @enderror">
                            {{-- @foreach ($kecamatans as $kecamatan)
                            <option value="" hidden>Pilih Kabupaten/Kota Terlebih Dahulu</option>
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->kecamatan }}</option>
                            @endforeach --}}
                            <option selected hidden>Pilih Kabupaten/Kota Terlebih Dahulu</option>
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
                            class="form-control mb-2  @error('nama_villa') is-invalid @enderror" placeholder="Nama Villa">
                        @error('nama_villa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="desc" cols="30" rows="7" class="form-control mb-2  @error('desc') is-invalid @enderror"
                            placeholder="Masukkan Deskripsi" value="{{ old('desc') }}"></textarea>
                        @error('review')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror+
                    </div> --}}
                    <div class="mb-3">
                        <label class="required form-label">Deskripsi Villa</label>
                        <input id="desc" value="{{ old('desc') }}" type="hidden" name="desc">
                        <trix-editor input="desc"></trix-editor>
                        @error('desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" min="0" name="harga"
                            class="form-control mb-2  @error('harga') is-invalid @enderror" placeholder="Input Harga">
                        @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" cols="30" rows="7" class="form-control mb-2  @error('alamat') is-invalid @enderror"
                            placeholder="Masukkan Alamat" value="{{ old('alamat') }}"></textarea>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Villa</label>
                        <input type="file" class="form-control mb-2 @error('foto') is-invalid @enderror" name="foto[]"
                            value="{{ old('foto') }}" multiple>
                        @error('foto')
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#kota').on('change', function() {
                var kota_id = $(this).val();
                if (kota_id) {
                    $.ajax({
                        url: '/getKecamatan/' + kota_id,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#kecamatan').empty();
                                $('#kecamatan').append(
                                    '<option hidden>Pilih Kecamatan</option>');
                                $.each(data, function(key, kecamatans) {
                                    $('select[name="kecamatan_id"]').append(
                                        '<option value="' + kecamatans.id + '">' +
                                        kecamatans.kecamatan + '</option>');
                                });
                            } else {
                                $('#kecamatan').empty();
                            }
                        }
                    });
                } else {
                    $('#kecamatan').empty();
                }
            });
        });
    </script>


@endsection
