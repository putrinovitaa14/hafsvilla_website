@extends('layouts.admin')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Data Review</h4>
                <div class="form-group">
                    <label>Kode Pemesanan</label>
                    <input type="text" name="rating" class="form-control mb-2  @error('rating') is-invalid @enderror"
                        value="{{ $ratings->pemesanan->kode_pemesanan }}" readonly>
                    @error('rating')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>user</label>
                    <input type="text" name="user" class="form-control mb-2  @error('user') is-invalid @enderror"
                        value="{{ $ratings->user->name }}" readonly>
                    @error('user')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Rating</label>
                    <input type="number" name="rating" class="form-control mb-2  @error('rating') is-invalid @enderror"
                        value="{{ $ratings->rating }}" readonly>
                    @error('rating')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Review</label>
                    <textarea name="review" cols="30" rows="7" class="form-control mb-2  @error('review') is-invalid @enderror"
                        placeholder="review" readonly>{{ $ratings->review }}</textarea>
                    @error('review')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <a href="/admin/rating" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>
@endsection
