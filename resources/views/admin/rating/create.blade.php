@extends('layouts.admin')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Data Review</h4>
                <form class="forms-sample" action="{{ route('rating.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Kode Pemesanan</label>
                        <select name="pemesanan_id" class="form-control mb-2  @error('pemesanan_id') is-invalid @enderror">
                            @foreach ($pemesanans as $pemesanan)
                                <option value="{{ $pemesanan->id }}">{{ $pemesanan->kode_pemesanan }}</option>
                            @endforeach
                        </select>
                        @error('pemesanan_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>User</label>
                        <select name="user_id" class="form-control mb-2  @error('user_id') is-invalid @enderror">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Rating</label>
                        <input type="number" name="rating"
                            class="form-control mb-2  @error('rating') is-invalid @enderror" placeholder="rating">
                        @error('rating')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Review</label>
                        <textarea name="review" cols="30" rows="7" class="form-control mb-2  @error('review') is-invalid @enderror"
                            placeholder="review" value="{{ old('review') }}"></textarea>
                        @error('review')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Kirim</button>
                    <a href="/admin/rating" class="btn btn-danger">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
