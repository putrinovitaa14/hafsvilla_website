<header>
    <!-- Header Start -->
    <div class="header-area header-sticky" style="border-radius: 5px">
        <div class="main-header ">
            <div class="container">
                <div class="row align-items-center">
                    <!-- logo -->
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo p-10" style="margin-left: -60px ">
                            <a href="index.html"><img src="{{ asset('assets/images/logobaru.png') }}" alt=""
                                    style="width: 80px"></a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <!-- main-menu -->
                        <div class="main-menu f-right" style="margin-right: -250px">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/morevilla">Villa</a></li>
                                    {{-- <li><a href="services.html">Service</a></li> --}}
                                    {{-- <li><a href="contact.html">Contact</a></li> --}}
                                    <li><a href="#">Account</a>
                                        <ul class="submenu">
                                            @auth()
                                                <li><a href="/profile">Profile</a>
                                                <li><a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}</a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                @endauth
                                                @guest()
                                                <li><a href="/login">Login</a>
                                                <li><a href="/register">Register</a></li>
                                            @endguest
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    {{-- <div class="col-xl-2 col-lg-2">
                        <!-- header-btn -->
                        <div class="header-btn">
                            <a href="#" class="btn btn1 d-none d-lg-block ">Booking</a>
                        </div>
                    </div> --}}
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
