@extends('layouts.user.user')

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        body {
            margin-top: 20px;

        }

        .shop-default #divProductList {
            transition: all 0.1s ease-in-out;
            -webkit-transition: all 0.1s ease-in-out
        }

        .shop-default .shop-grid-section-header {
            height: 62px;
            padding: 15px;
            border-bottom: 1px solid #f1f1f1
        }

        .shop-default .shop-grid-section-header .shop-grid-section-title {
            margin: 0;
            padding: 0 1rem;
            font-size: 1rem;
            font-family: "Nunito", sans-serif;
            font-weight: 600;
            color: #111
        }

        .shop-default .shop-grid-section-footer {
            padding: 1rem
        }

        .shop-default .btn-view-mode {
            font-size: 20px;
            line-height: 1.6;
            margin-right: 0;
            color: #eceeef
        }

        .shop-default .btn-view-mode.active {
            color: #2b2b2c
        }

        .shop-default .aux-text {
            display: inline-block;
            font-family: "Roboto", sans-serif;
            font-weight: 600;
            font-size: .875rem;
            color: #2b2b2c
        }

        .shop-default .btn-reset-filters {
            font-weight: 400
        }

        .shop-default .btn-reset-filters>i {
            margin-right: 5px;
            font-size: 13px
        }

        .shop-default .product .price-wrapper .price {
            font-size: 32px;
            color: #2b2b2c
        }

        .shop-default .product .price-wrapper .price sup {
            font-size: 16px;
            top: -1em;
            font-weight: 400
        }

        .shop-default .product .price-wrapper .price .price-value {
            margin: 0 3px
        }

        .shop-default .product .price-wrapper .price.discount {
            text-decoration: none;
            margin-right: 8px
        }


        .shop-default .product .product-colors .color-switch a {
            display: inline-block;
            float: none !important;
            width: 16px;
            height: 16px;
            margin-right: 3px;
            margin-bottom: 0;
            border-radius: .25rem
        }

        .shop-default .filter-sidebar {
            padding: 30px
        }

        .shop-cards .product.product--style-2 {
            position: relative
        }

        .shop-cards .product.product--style-2 .product-image {
            display: inline-block;
            float: left;
            width: 40%
        }

        .shop-cards .product.product--style-2 .product-content {
            display: inline-block;
            width: 60%
        }

        .shop-cards .product.product--style-2 .product-content .product-info {
            position: absolute;
            right: 20px;
            bottom: 12px
        }

        .shop-cards .product.product--style-2 .product-content .product-info .price-wrapper {
            display: block;
            margin-bottom: 10px
        }

        .shop-cards .product.product--style-2 .product-content .product-icon-btn {
            display: inline-block;
            margin-right: 10px;
            font-size: 16px;
            color: #2b2b2c;
            font-weight: 500
        }

        .shop-cards .product.product--style-2 .product-content .product-icon-btn.active {
            color: #3452ff
        }

        .shop-cards .product.product--style-2 .product-content .product-icon-btn:last-child {
            margin-right: 0
        }

        .shop-cards .product.product--style-2 .product-content .product-icon-btn:hover {
            color: #3452ff
        }

        .shop-cards .product .product-description {
            color: #818a91;
            font-size: .875rem;
            line-height: 1.6
        }

        .shop-cards .product .product-long-description {
            max-width: 360px;
            margin: 0 auto
        }

        .shop-cards.shop-tech .product-buttons .btn-cart {
            font-size: 0.625rem !important;
            padding: 0.625rem 0.875rem !important
        }

        .shop-cards.shop-tech .product-buttons .btn-icon {
            background: transparent;
            border: 0;
            text-align: center;
            font-size: 1.2rem;
            padding: 2px;
            color: #818a91;
            border: 0;
            cursor: pointer
        }

        .shop-cards.shop-tech .product-buttons .btn-icon:hover,
        .shop-cards.shop-tech .product-buttons .btn-icon.active {
            color: #2b2b2c
        }

        .shop-cards .product .price-wrapper .price-sm {
            font-size: 24px
        }

        .shop-cards .product .price-wrapper .price-sm.discount .price-value {
            font-size: 1rem;
            font-weight: 600
        }

        .shop-grid .product {
            margin: 0;
            padding: 1.5rem
        }

        .shop-sportswear .product {
            background-color: #FFF
        }

        .shop-sportswear .block-image {
            padding: 1.5rem
        }

        .shop-minimalist .product {
            border: 0
        }

        .shop-minimalist .product .product-image {
            position: relative;
            background: #ebebeb;
            padding: 2rem
        }

        .shop-minimalist .product:not(.no-radius) .product-image,
        .shop-minimalist .product .product-image .mask {
            border-radius: .25rem
        }

        .shop-minimalist .product .product-image .product-title {
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            text-transform: none;
            margin: 30px 0
        }

        .shop-minimalist .product .product-image .product-price-wrapper {
            position: absolute;
            bottom: 30px;
            left: 0;
            width: 100%
        }

        .shop-minimalist .product .product-image .product-price {
            font-weight: 400;
            color: #fff
        }

        .shop-minimalist .product .product-image .product-price .price-value {
            font-size: 24px
        }

        .shop-minimalist .product .product-image .product-price.discount {
            padding: 7px 0 0;
            margin-right: 4px;
            font-size: .875rem;
            font-weight: 400;
            color: #ff3b30;
            text-decoration: line-through
        }

        .product .product-actions--1.in,
        .product .product-actions--2.in,
        .product .product-actions--3.in {
            opacity: 1
        }

        .product .product-actions--1.animated,
        .product .product-actions--2.animated,
        .product .product-actions--3.animated {
            -webkit-animation-duration: 0.5s;
            -moz-animation-duration: 0.5s;
            -ms-animation-duration: 0.5s;
            -o-animation-duration: 0.5s;
            animation-duration: 0.5s
        }

        .product .product-actions--1 {
            opacity: 0;
            width: 42px;
            position: absolute;
            left: 15px;
            bottom: 20px
        }

        .product .product-actions--1 .btn-product-action {
            display: block;
            width: 100%;
            height: 38px;
            line-height: 38px;
            margin-bottom: 6px;
            border: 0;
            border-radius: 38px;
            background: #eceeef;
            color: #2b2b2c;
            font-size: 18px;
            outline: 0;
            cursor: pointer
        }

        .product .product-actions--1 .btn-product-action:hover {
            background: #3452ff;
            color: #FFF;
            border-color: #0127ff
        }

        .product .product-actions--1 .btn-product-action:active {
            border-color: transparent
        }

        .product .product-actions--2 {
            opacity: 0;
            width: 80px;
            height: 40px;
            position: absolute;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.9)
        }

        .product .product-actions--2 .btn-product-action {
            display: inline-block;
            float: left;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border: 0;
            background: transparent;
            color: #2b2b2c;
            font-size: 1rem;
            outline: 0;
            cursor: pointer
        }

        .product .product-actions--2 .btn-product-action:hover {
            background: transparent;
            color: #3452ff
        }

        .product .product-actions--2 .btn-product-action:active {
            border-color: transparent
        }

        .product .product-actions--3 {
            opacity: 0;
            width: 80px;
            height: 40px;
            position: absolute;
            top: 10px;
            left: 10px;
            background: transparent
        }

        .product .product-actions--3.in {
            opacity: 1
        }

        .product .product-actions--3 .btn-product-action {
            display: inline-block;
            float: left;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border: 0;
            background: transparent;
            color: #2b2b2c;
            font-size: 1rem;
            outline: 0;
            cursor: pointer
        }

        .product .product-actions--3 .btn-product-action:hover {
            background: transparent;
            color: #3452ff
        }

        .product .product-actions--3 .btn-product-action:active {
            border-color: transparent
        }

        .product-ribbon {
            position: absolute;
            top: 15px
        }

        .product-ribbon.product-ribbon-left {
            left: 15px
        }

        .product-ribbon.product-ribbon-right {
            right: 15px
        }

        .product-ribbon.no-space {
            top: 0
        }

        .product-ribbon.no-space.product-ribbon-left {
            left: 0
        }

        .product-ribbon.no-space.product-ribbon-right {
            right: 0
        }

        .product-ribbon.product-ribbon--style-1 {
            width: 48px;
            height: 48px;
            border-radius: 100%;
            text-align: center;
            line-height: 48px;
            font-size: 11px;
            z-index: 10
        }

        .product-swiper-container {
            position: relative;
            padding-top: 20px
        }

        .product-swiper-container .swiper-slide img {
            max-width: 100%
        }

        .product-swiper-container .swiper-pagination {
            top: 0;
            bottom: auto;
            text-align: left
        }

        .product-description-wrapper .product-short-info {
            margin: 30px 0
        }

        .product-description-wrapper .product-short-info span {
            display: block;
            padding: 4px
        }

        .product-description-wrapper .product-short-info strong {
            /* font-weight: 500; */
            font-weight: 200px;
            color: #818a91;
            margin-right: 5px
        }

        .block {
            margin: 0;
            -webkit-transition: all 0.3s linear;
            transition: all 0.3s linear;
            position: relative;
            cursor: default;
            border-radius: .25rem .25rem .25rem;
            -moz-border-radius: .25rem .25rem .25rem
        }

        .block:after,
        .block:before {
            display: table;
            content: ""
        }

        .block:after {
            clear: both
        }

        a>.block {
            cursor: pointer
        }

        .block.no-radius>.block-image img {
            border-radius: 0 !important
        }

        .block .lead {
            margin-bottom: 0
        }

        .block-stack-wrapper {
            border-radius: .25rem
        }

        .block-stack-wrapper .row {
            background: #fff
        }

        @media (max-width: 991px) {
            .block-stack-wrapper .row {
                margin-bottom: 20px
            }
        }

        .block .block-body {
            padding: 1.5rem 1.5rem
        }

        .block .block-body>p {
            margin-bottom: 0
        }

        .block .block-image {
            -webkit-transition: all 0.3s linear;
            transition: all 0.3s linear;
            position: relative
        }

        .block .block-image img {
            max-width: 100%
        }

        .z-depth-2-top,
        .z-depth-2-top--hover:hover {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }

        .bg-blue {
            background-color: #007aff !important;
            color: #FFF;
        }

        .product-ribbon {
            position: absolute;
            top: 15px;
        }

        .bg-pink {
            background-color: #ff2d55 !important;
            color: #FFF;
        }

        .bg-purple {
            background-color: #5856d6 !important;
            color: #FFF;
        }

        .strong-600 {
            font-weight: 600 !important;
        }

        .text-capitalize {
            text-transform: capitalize !important;
        }

        .heading-5 {
            font-size: 1.8rem !important;
        }

        .heading {
            margin: 0 0 6px;
            padding: 0;
            text-transform: none;
            font-family: "Nunito", sans-serif;
            font-weight: 600;
            color: #111;
            line-height: 1.46;
        }
    </style>

    <div class="container my-5">
        <div class="shop-default shop-cards shop-tech">
            <div class="col-md-6 mx-auto">
                <div class="block product no-border z-depth-2-top z-depth-2--hover">
                    <div class="block-image">
                        {{-- <a href="#">
                        <img src="{{ asset($villas->image[0]->foto) }}" class="img-center">
                    </a> --}}
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset($villas->image[0]->foto) }}">
                                </div>
                                @foreach ($images->skip(1) as $image)
                                    <div class="carousel-item">
                                        <img src="{{ asset($image->foto) }}">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        {{-- <span
                        class="product-ribbon product-ribbon-right product-ribbon--style-1 bg-blue text-uppercase">New</span>
                    --}}
                    </div>

                    <div class="block-body text-center">
                        <h3 class="heading heading-5 strong-600 text-capitalize">
                            <a>
                                {{ $villas->nama_villa }}
                            </a>
                        </h3>
                        <p class="product-description">
                            <a>
                                {!! $villas->desc !!}
                            </a>
                        </p>

                        <div class="product-buttons mt-4">
                            <div class="row align-items-center">
                                <div class="col-2">
                                    <button type="button" class="btn-icon" data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="Favorite">
                                        <i class="fa fa-heart"></i>
                                    </button>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn-icon" data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="Compare">
                                        <i class="fa fa-share"></i>
                                    </button>
                                </div>
                                <div class="col-8">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Booking Now
                                    </button>

                                    <!-- Modal -->
                                    <form action="/booking" method="POST">
                                        <div class="modal fade" id="exampleModal" style="z-index: 99999"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Pemesanan Villa</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
