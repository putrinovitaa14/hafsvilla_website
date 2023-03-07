@extends('layouts.user.user')

@section('content')
    <!-- css -->
    <style>
        .product-detail {
            position: relative;
            width: 100%;
            padding: 30px 0;
            /* margin-left: 250px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            background-color: #999999; */
        }

        .product-detail .product-detail-top,
        .product-detail .product-detail-bottom {
            margin-bottom: 30px;
        }

        .product-detail .product-detail-top {
            padding: 0;
            background: #ffffff;
        }

        .product-detail .product-slider-single img {
            width: 100%;
        }

        .product-detail .product-slider-single-nav {
            margin: 15px 30px 30px 30px;
            border: 3px double #FF6F61;
        }

        .product-detail .product-slider-single-nav .slider-nav-img {
            border-right: 1px solid #FF6F61;
            overflow: hidden;
        }

        .product-detail .product-slider-single-nav img {
            width: 100%;
            transition: all .3s;
        }

        .product-detail .product-slider-single-nav img:hover {
            transform: scale(1.2);
        }

        .product-detail .product-content,
        .product-detail .product-content .title,
        .product-detail .product-content .ratting,
        .product-detail .product-content .price,
        .product-detail .product-content .details,
        .product-detail .product-content .quantity,
        .product-detail .product-content .action {
            position: relative;
            width: 100%;
        }

        .product-detail .product-content {
            padding: 30px;
        }

        @media (min-width: 768px) {
            .product-detail .product-content {
                padding-left: 0;
            }
        }

        .product-detail .product-content .title h2 {
            font-size: 25px;
            margin-bottom: 5px;
        }

        .product-detail .product-content .ratting {
            margin-bottom: 10px;
        }

        .product-detail .product-content .ratting i {
            color: #FF6F61;
            font-size: 16px;
        }

        .product-detail .product-content .price,
        .product-detail .product-content .quantity,
        .product-detail .product-content .p-size,
        .product-detail .product-content .p-color {
            margin-bottom: 15px;
        }

        .product-detail .product-content .price h4,
        .product-detail .product-content .quantity h4,
        .product-detail .product-content .p-size h4,
        .product-detail .product-content .p-color h4 {
            display: inline-block;
            width: 80px;
            font-size: 18px;
            font-weight: 700;
            margin-right: 5px;
        }

        .product-detail .product-content .price p {
            display: inline-block;
            color: #FF6F61;
            font-size: 30px;
            font-weight: 700;
            margin: 0;
        }

        .product-detail .product-content .price span {
            color: #999999;
            text-decoration: line-through;
            margin-left: 12px;
        }

        .product-detail .product-content .quantity .qty {
            display: inline-block;
            font-size: 0;
        }

        /* .product-detail .product-content .quantity button {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        width: 30px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        height: 30px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        padding: 2px 0;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        font-size: 16px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        text-align: center;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        color: #ffffff;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        background: #FF6F61;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        border: none;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } */

        .product-detail .product-content .quantity button.btn-minus {
            border-radius: 4px 0 0 4px;
        }

        .product-detail .product-content .quantity button.btn-plus {
            border-radius: 0 4px 4px 0;
        }

        .product-detail .product-content .quantity input {
            width: 40px;
            height: 30px;
            color: #ffffff;
            font-size: 16px;
            text-align: center;
            background: #000000;
            border: none;
        }

        .product-detail .product-content .action a:first-child {
            margin-right: 11px;
        }

        .product-detail .product-content .action a i {
            margin-right: 5px;
        }

        .product-detail .nav.nav-pills .nav-link {
            color: #FF6F61;
            background: #000000;
            border-radius: 0;
            transition: all .3s;
        }

        .product-detail .nav.nav-pills .nav-link:hover,
        .product-detail .nav.nav-pills .nav-link.active {
            color: #000000;
            background: #FF6F61;
        }

        .product-detail .tab-content {
            background: #ffffff;
            padding: 25px 15px 15px 15px;
        }

        .product-detail .tab-content ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .product-detail .tab-content ul li {
            margin-bottom: 10px;
        }

        .product-detail .tab-content ul li::before {
            content: '\f061';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            padding-right: 5px;
        }

        .product-detail .tab-content .reviews-submitted {
            position: relative;
            margin-bottom: 45px;
        }

        .product-detail .tab-content .reviewer {
            color: #FF6F61;
            font-size: 18px;
            font-weight: 600;
        }

        .product-detail .tab-content .reviewer span {
            color: #666666;
            font-size: 14px;
            font-weight: 400;
        }

        .product-detail .tab-content .ratting {
            color: #FF6F61;
            margin-bottom: 15px;
        }

        .product-detail .tab-content .reviews-submit .ratting {
            font-size: 24px;
        }

        .product-detail .tab-content .form input {
            width: 100%;
            height: 35px;
            padding: 0 15px;
            color: #666666;
            border: 1px solid #dddddd;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .product-detail .tab-content .form textarea {
            width: 100%;
            height: 80px;
            padding: 6px 15px;
            color: #666666;
            border: 1px solid #dddddd;
            border-radius: 4px;
            margin-bottom: 15px;
        }



        /* .product-detail .tab-content .form button {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        display: inline-block;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        height: 35px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        padding: 0 15px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        color: #FF6F61;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        background: #ffffff;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        border: 1px solid #FF6F61;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        border-radius: 4px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        margin-bottom: 15px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        transition: all .3s;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } */

        .product-detail .tab-content .form button:hover {
            color: #ffffff;
            background: #FF6F61;
        }

        .desc1 {
            color: #666666;

        }

        /* end css */
    </style>

    <div class="product-detail" style="margin-bottom: 140px;">
        <div class="container d-flex
        align-items-center">
            <div class="row text-center">
                <div class="col-lg-10">
                    <div class="product-detail-top">
                        <div class="card shadow-lg p-2 text-center mx-auto" style="width:900px;">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                        <!-- <img src="{{ asset($villas->image[0]->foto) }}"> -->
                                        <img src="{{ asset($villas->image[0]->foto) }}"
                                            style="height: 330px; margin-left: 50px">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title">
                                            <h2>{{ $villas->nama_villa }}</h2>
                                        </div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>

                                        <div class="price">
                                            {{-- <h4>Price:</h4> --}}
                                            <p>Rp. {{ number_format($villas->harga, 0, ',', '.') }}
                                            <h4>/Malam</h4>
                                            </p>
                                        </div>

                                        <div class="title">
                                            <h2 class="desc1" style="font-size: 18px; margin-bottom: 20px">
                                                {!! $villas->desc !!}</h2>
                                        </div>

                                        <div>
                                            {{-- <h4>Price:</h4> --}}
                                            <p>{{ $villas->kota->kota }}
                                            </p>
                                        </div>

                                        <div class="action">
                                            {{-- <a class="btn" href="#" style="height: 50px"><i class="fa fa-shopping-cart"
                                                    style="margin-top: -15px" data-toggle="modal"
                                                    data-target="#exampleModal"></i>Book Now</a> --}}
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal">
                                                Booking Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-12">

                <form action="/booking" method="POST">
                    <div class="modal fade" id="exampleModal" style="z-index: 99999" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Pemesanan Villa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <input type="hidden" name="villa_id" value="{{ $villas->id }}">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Tanggal
                                            Masuk</label>
                                        <input type="date" class="form-control" name="tanggal_masuk" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Tanggal
                                            Keluar</label>
                                        <input type="date" class="form-control" name="tanggal_keluar"
                                            id="recipient-name">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            {{-- <div class="row product-detail-bottom">
                <div class="col-lg-12">
                    <ul class="nav nav-pills">
                        <li class="nav-item" style="margin-left: 1250px">
                            <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                        </li>
                    </ul>

                    <form action="/booking" method="POST">
                        <div class="modal fade" id="exampleModal" style="z-index: 99999" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pemesanan Villa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @csrf
                                        <input type="hidden" name="villa_id" value="{{ $villas->id }}">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Tanggal
                                                Masuk</label>
                                            <input type="date" class="form-control" name="tanggal_masuk"
                                                id="recipient-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Tanggal
                                                Keluar</label>
                                            <input type="date" class="form-control" name="tanggal_keluar"
                                                id="recipient-name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div> --}}
        </div>
    </div>
@endsection
