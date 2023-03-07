@extends('layouts.user.user')

@section('content')
    <div class="slider-area">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
            data-background="{{ asset('assetp/img/hero/aboutpage_hero.jpg') }}">
            <div class="container">
                <div class="row ">
                    <div class="col-md-11 offset-xl-1 offset-lg-1 offset-md-1">
                        <div class="hero-caption">
                            {{-- <span>Our Villa</span> --}}
                            <h2>Our Villa</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Room Start -->
    <section class="room-area mt-5">
        <div class="container">
            <div class="row ">
                @foreach ($villas as $villa)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <!-- Single Room -->
                        <div class="single-room mb-50">
                            <div class="room-img">
                                <a href="/villa/{{ $villa->id }}"><img src="{{ asset($villa->image[0]->foto) }}"
                                        alt="" width="100px" height="300px"></a>
                            </div>
                            <div class="room-caption">
                                <h3><a href="/villa/{{ $villa->id }}">{{ $villa->nama_villa }}</a></h3>
                                <div class="per-night">
                                    <span><u>Rp. </u>{{ number_format($villa->harga) }} <span>/ malam</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
    <!-- Room End -->
@endsection
