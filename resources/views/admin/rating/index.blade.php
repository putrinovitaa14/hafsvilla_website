@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Review</h4>

                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pemesanan</th>
                                <th>Costumer</th>
                                <th>Rating</th>
                                <th>Review Customer</th>
                                <th>Dibuat</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ratings as $rating)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $rating->pemesanan->kode_pemesanan }}</td>
                                    <td>{{ $rating->user->name }}</td>
                                    <td>{{ $rating->rating }}</td>
                                    <td>{{ $rating->review }}</td>
                                    <td>{{ $rating->created_at }}</td>
                                    {{-- <td>
                                        <a href="{{ route('rating.show', $rating->id) }}" class="btn btn-sm btn-secondary"
                                            data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                            data-bs-html="true" title="<span>Show Data</span>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg>
                                        </a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
