@extends('layouts.user.user')

@section('content')

    <style>
        .rating-css input {
            display: none;
        }

        .rating-css input+label {
            font-size: 25px;
            color: rgb(63, 63, 60);
            text-shadow: 1px 1px 0 grey;
            cursor: pointer;
        }

        .rating-css input:checked+label~label {
            color: #b4afaf;
        }

        .rating-css label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        }
    </style>

    <section style="background-color: #eee;">
        <div class="container py-5">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $user->name }}</h5>
                            <p class="text-muted mb-1">{{ $user->email }}</p>
                            {{-- <div class="d-flex justify-content-center mb-2"> --}}
                            <button type="button" class="btn-sm btn-secondary" style="margin-top: 20px">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                    style="color:white">
                                    {{ __('Log Out') }}</a></button>
                            {{-- </div> --}}
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            @if (count($pemesanan))
                                @foreach ($pemesanan as $data)
                                    <div class="card p-3 mb-3">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="{{ asset($data->villa->image[0]->foto) }}" alt=""
                                                    width="200px">
                                            </div>
                                            <div class="col p-2">
                                                <h4>{{ $data->villa->nama_villa }}</h4>
                                                <p>{{ $data->durasi }} Day</p>
                                                <p>{{ $data->tanggal_masuk }} - {{ $data->tanggal_keluar }}</p>

                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal" style="margin-right: 200px"
                                                    data-whatever="@getbootstrap">Review</button>


                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Riview Villa
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/ratingVilla" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="pemesanan_id"
                                                                        value="{{ $data->id }}">
                                                                    <div class="form-group">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Rating</label>
                                                                        <div class="rating-css">
                                                                            <div class="star-icon">
                                                                                <input type="radio" value="1"
                                                                                    name="rating" checked id="rating1">
                                                                                <label for="rating1"
                                                                                    class="bx bxs-star"></label>
                                                                                <input type="radio" value="2"
                                                                                    name="rating" id="rating2">
                                                                                <label for="rating2"
                                                                                    class="bx bxs-star"></label>
                                                                                <input type="radio" value="3"
                                                                                    name="rating" id="rating3">
                                                                                <label for="rating3"
                                                                                    class="bx bxs-star"></label>
                                                                                <input type="radio" value="4"
                                                                                    name="rating" id="rating4">
                                                                                <label for="rating4"
                                                                                    class="bx bxs-star"></label>
                                                                                <input type="radio" value="5"
                                                                                    name="rating" id="rating5">
                                                                                <label for="rating5"
                                                                                    class="bx bxs-star"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text"
                                                                            class="col-form-label">Message:</label>
                                                                        <textarea class="form-control" name="review" id="message-text"></textarea>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Send
                                                                    message</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                {{-- <div class="text-center">
                                    <img src="{{ asset('assetf/assets/img/gallery/2.png') }}" alt="" srcset="">
                                    <h4 style="margin-top: 20px">Belum Ada Pemesanan</h4>
                                </div> --}}
                                <div class="alert alert-dark text-center" role="alert" style="margin-top: 10px">
                                    Tidak Ada History
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
@endsection
