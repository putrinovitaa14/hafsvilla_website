@extends('layouts.admin')

@section('content')
    <!-- partial -->
    <div class="row">
        {{-- <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-people mt-auto">
                    <img src="{{ asset('assets/images/dashboard/people.svg') }}" alt="people">
                    <div class="weather-info">
                        <div class="d-flex">
                            <div class="ml-5">

                                <h2 class=" font-weight-bold">Welcome Admin</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-md-12 grid-margin transparent" style="margin-top: -15px">
            <div class="row">
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Total Pemesanan</p>
                            @php
                                $totalpemesanan = App\Models\Pemesanan::count();
                            @endphp
                            <p class="fs-30 mb-2">{{ $totalpemesanan }} Pesanan</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Jumlah Costumer</p>
                            @php
                                $jumlahuser = App\Models\User::where('role', 'user')->count();
                            @endphp
                            <p class="fs-30 mb-2">{{ $jumlahuser }} Costumer</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Jumlah Villa</p>
                            @php
                                $jumlahvilla = App\Models\Villa::count();
                            @endphp
                            <p class="fs-30 mb-2">{{ $jumlahvilla }} Villa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card" style="margin-top: -40px">
            <div class="card tale-bg">
                <div class="card-people mt-auto">
                    <img src="{{ asset('assets/images/dashboard/people.svg') }}" alt="people">
                    <div class="weather-info">
                        <div class="d-flex">
                            <div class="ml-5 ">
                                <h2 class=" font-weight-bold" style="margin-top: 10px">Welcome Admin
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
