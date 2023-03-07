@extends('layouts.user.user')

@section('content')
    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active dot-style">
                <div class="single-slider  hero-overly slider-height d-flex align-items-center"
                    data-background="{{ asset('assetp/img/hero/h1_hero.jpg') }}">
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-9">
                                <div class="h1-slider-caption">
                                    <h1 data-animation="fadeInUp" data-delay=".4s">Top Villa in the city</h1>
                                    <h3 data-animation="fadeInDown" data-delay=".4s">Villa & Resourt</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider  hero-overly slider-height d-flex align-items-center"
                    data-background="{{ asset('assetp/img/hero/h1_hero.jpg') }}">
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-9">
                                <div class="h1-slider-caption">
                                    <h1 data-animation="fadeInUp" data-delay=".4s">Top villa in the city</h1>
                                    <h3 data-animation="fadeInDown" data-delay=".4s">Villa & Resourt</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider  hero-overly slider-height d-flex align-items-center"
                    data-background="{{ asset('assetp/img/hero/h1_hero.jpg') }}">
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-9">
                                <div class="h1-slider-caption">
                                    <h1 data-animation="fadeInUp" data-delay=".4s">Nyaman dan Berkualitas</h1>
                                    <h3 data-animation="fadeInDown" data-delay=".4s">Villa & Resourt</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->

        <!-- Booking Room Start-->

        {{-- <div class="booking-area">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <form action="">
                        <div class="booking-wrap d-flex justify-content-between align-items-center">

                            <!-- Single Select Box -->
                            <div class="single-select-box mb-30">
                                <div class="boking-tittle">
                                    <span>Sesuai Lokasi</span>
                                </div>
                                <div class="select-this">
                                    <form action="#">
                                        <div class="select-itms">
                                            <select name="select" id="select1" placeholder="Nama Villa">
                                                @foreach ($villas as $villa)
                                                <option value="{{ $villa->id }}">{{ $villa->nama_villa }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <div class="single-select-box mb-30">
                                <div class="boking-tittle">
                                    <span>Nama Villa</span>
                                </div>
                                <div class="select-this">
                                    <form action="#">
                                        <div class="select-itms">
                                            <select name="select" id="select1" placeholder="Nama Villa">
                                                @foreach ($villas as $villa)
                                                <option value="{{ $villa->id }}">{{ $villa->nama_villa }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="single-select-box mb-30">
                                <div class="boking-tittle">
                                    <span>Sesuai Harga</span>
                                </div>
                                <div class="select-this">
                                    <form action="#">
                                        <div class="select-itms">
                                            <select name="select" id="select1" placeholder="Daftar Harga">
                                                @foreach ($villas as $villa)
                                                <option value="{{ $villa->id }}">Rp {{ number_format($villa->harga) }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Single Select Box -->
                            <div class="single-select-box pt-45 mb-30">
                                <a href="#" class="btn select-btn">Book Now</a>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

        <!-- Booking Room End-->

        <!-- Make customer Start-->
        <section class="make-customer-area customar-padding fix" style="margin-top: -120px">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="customer-img mb-120">
                            <img src="{{ asset('assetp/img/customer/customar1.png') }}" class="customar-img1"
                                alt="">
                            <img src="{{ asset('assetp/img/customer/customar2.png') }}" class="customar-img2"
                                alt="">
                            <div class="service-experience heartbeat">
                                {{-- <h3>25 Years of Service<br>Experience</h3> --}}
                                <h3>Memberi Pelayanan Terbaik</h3>
                            </div>
                        </div>
                    </div>
                    <div class=" col-xl-4 col-lg-4">
                        <div class="customer-caption">
                            <span>Tentang Kami</span>
                            <h2>Ciptakanlah pengalaman terbaik menjadi Kesan yang Menyenangkan</h2>
                            <div class="caption-details">
                                <p class="pera-dtails">Temukan tempat menginap ideal dengan harga yang menarik di berbagai
                                    kota yang ada di jawabarat.</p>
                                {{-- Liburan Merasa nyaman di mana pun bersama Hafsvilla Booking. </p> --}}
                                <p>Kami menyediakan berbagai macam dan jenis Villa yang sangat berkualitas tentunya dengan
                                    harga yang terjangkau. Membuat Liburan anda menjadi menyenangkan dengan penginapan yang
                                    sangat nyaman
                                </p>
                                {{-- <a href="#" class="btn more-btn1">Selengkapnya <i class="ti-angle-right"></i> --}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Make customer End-->

        <!-- Room Start -->
        <section class="room-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <!--font-back-tittle  -->
                        <div class="font-back-tittle mb-45">
                            <div class="archivment-front">
                                <h3>Our Villa</h3>
                            </div>
                            <h3 class="archivment-back">Our Villa</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                <div class="row justify-content-center">
                    <div class="room-btn pt-70">
                        <a href="/morevilla" class="btn view-btn1">View more <i class="ti-angle-right"></i> </a>
                    </div>
                </div>
            </div>

        </section>
        <!-- Room End -->

        <!-- Dining Start -->
        <div class="dining-area dining-padding-top">
            <!-- Single Left img -->
            <div class="single-dining-area left-img">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-8 col-md-8">
                            <div class="dining-caption">
                                {{-- <span>Our resturent</span> --}}
                                <h3>Dining & Drinks</h3>
                                <p>Receive and serve the system of ordering meal and drink packages to provide convenience
                                    to customers when with extended family </p>
                                <a href="#" class="btn border-btn">Learn More <i class="ti-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single Right img -->
            <div class="single-dining-area right-img">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-lg-8 col-md-8">
                            <div class="dining-caption text-right">
                                {{-- <span>Our Pool</span> --}}
                                <h3>Swimming Pool</h3>
                                <p>All villas have a large swimming pool also accompanied by gardens for a place to relax
                                    when with family or couples</p>
                                <a href="#" class="btn border-btn">Learn More <i class="ti-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dining End -->


        <!-- Gallery img Start-->
        <div class="gallery-area fix" style="margin-top: 100px">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="gallery-active owl-carousel">
                            <div class="gallery-img">
                                <a href="#"><img src="{{ asset('assetp/img/gallery/gallery1.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="gallery-img">
                                <a href="#"><img src="{{ asset('assetp/img/gallery/gallery2.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="gallery-img">
                                <a href="#"><img src="{{ asset('assetp/img/gallery/gallery3.jpg') }}"
                                        alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gallery img End-->
    </main>
@endsection
