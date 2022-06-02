<div class="top">
    <p class="fs-14 mb-0 text-center fw-normal py-1"> <a href="#" class="text-white text-underline"> Learn more about
            traveling safely during COVID-19 </a> </p>
</div>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white custom-nav py-3">
        <div class="container-fluid px-lg-3"> <a class="navbar-brand" href="{{ url('/') }}"> <img
                    src="{{ asset('/images/cobraLogo01.png') }}" style="width: 75px; height: 75px;" alt="logo"
                    class="img-fluid"> </a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav"> <a class="nav-link" href="{{ url('/') }}">Home</a> <a
                        class="nav-link" href="{{ route('about') }}">About Us</a> <a class="nav-link"
                        href="{{ route('service') }}">Services </a> <a class="nav-link"
                        href="{{ route('bike.list') }}">Bikes </a> <a class="nav-link" href="{{ route('brands') }}">Brands </a> {{-- <a class="nav-link" href="{{ route('destinations') }}">Destinations </a> --}} <a
                        class="nav-link" href="{{ route('testimonial') }}">Testimonials </a> <a
                        class="nav-link" href="{{ route('insurance') }}">
                        Insurance & Protection </a> <a class="nav-link" href="{{ route('contact') }}">Contact
                    </a> </div>
            </div>
            <div class="btn-nav-right d-xl-flex">
                <a href="{{ route('becomeHost') }}"
                    class="text-dark fw-500 custom-border py-2 button-3 d-block d-md-inline text-center mb-3">
                    Became A Host
                </a>
                @if (Auth::check())
                    <div class="dropdown avatar-dropdown mt-2 mt-xl-0">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @if (auth()->user()->role == 'seller' and auth()->user()->seller != null)
                                @if(auth()->user()->seller->avatar != null)
                                <img src="{{ asset('storage/' . auth()->user()->seller->avatar) }}" width="30"
                                    height="30" alt="" class="avartar_img">
                                @else
                                <img src="{{ asset('images/profile-img.svg') }}" width="30" height="30" alt=""
                                    class="avartar_img">
                                @endif
                            @elseif (auth()->user()->role == 'buyer' and auth()->user()->buyer != null)
                                @if(auth()->user()->buyer->avatar != null)
                                <img src="{{ asset('storage/' . auth()->user()->buyer->avatar) }}" width="30"
                                    height="30" alt="" class="avartar_img">
                                @else
                                <img src="{{ asset('images/profile-img.svg') }}" width="30" height="30" alt=""
                                    class="avartar_img">
                                @endif
                            @else
                                <img src="{{ asset('images/profile-img.svg') }}" width="30" height="30" alt=""
                                    class="avartar_img">
                            @endif
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <a class="dropdown-item"
                                    @if (auth()->user()->role == 'admin') href="{{ route('admin.index') }}" @endif
                                    @if (auth()->user()->role == 'seller') href="{{ route('seller.index') }}" @endif
                                    @if (auth()->user()->role == 'buyer') href="{{ route('buyer.index') }}" @endif>My
                                    Dashboard</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a class="nav-link header_login" href="{{ route('login') }}">Login
                    </a>
                @endif
            </div>
        </div>
        </div>
    </nav>
</header>
