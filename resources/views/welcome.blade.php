@extends('layouts.app')

@section('content')
    <main class="bg-body">
        <section class="banner">
            <div class="container">
                <div class="row pt-10">
                    <div class="col">
                        <p class="text-uppercase text-white mb-0">rent</p>
                        <p class="text-uppercase mb-0 ps-75 ride">a ride</p>
                        <p class="text-uppercase text-white mb-0 ps-350">now</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="searchBar">
            <div class="container">
                <div class="row justify-content-center mx-auto">
                    <div class="col-xl-10">
                        <form action="{{ route('bike.list') }}" class="row" method="get">
                            <input type="hidden" name="filter" value="filter">
                            <div
                                class="col-lg-3 d-flex justify-content-center col-md-6 mb-md-3 mb-lg-0 border-bottom-sm-my">
                                <img src="{{ asset('/images/location-icon.png') }}" class="img-fluid fit-none" alt="">
                                <div class="space w-100">
                                    <label for="location">Location</label>
                                    <!--<input type="text" class="form-control" id="location" placeholder="Choose a city ( Ex. Miami,FL)">-->
                                    <select name="location" class="form-select">
                                        <option selected value="">Location</option>
                                        @foreach($state as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-md-3 mb-lg-0 border-bottom-sm-my">
                                <div class="border-start-my border-end-my d-flex ps-lg-3 justify-content-center ">
                                    <img src="{{ asset('/images/calander.png') }}" class="img-fluid fit-none" alt="">
                                    <div class="space ">
                                        <label for="from">Start Date(Optional)</label>
                                        <input type="date" name="pickup" class="form-control" placeholder="Start Date(Optional)">
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-lg-4 col-md-6 d-flex justify-content-center mb-md-3 mb-lg-0 border-bottom-sm-my">
                                <img src="{{ asset('/images/calander.png') }}" class="img-fluid fit-none" alt="">
                                <div class="space">
                                    <label for="from">End Date(Optional)</label>
                                    <input type="date" name="dropoff" class="form-control" placeholder="End Date(Optional)">
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-6 text-lg-end text-center">
                                <button type="submit" class="btn btn-primary button-2 rounded-pill border-0 fs-5"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="destination-section pt-10 pt-0 ">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center pb-lg-5 pb-3">
                        <h2 class="fs-48">
                            Choose Your Destination
                        </h2>
                        <p>
                            Explore the world's largest car sharing marketplace
                        </p>
                    </div>
                </div>
            </div>
            <div class="container position-relative">
                <div class="prev-destination-slider "> <i class="fa-solid fa-chevron-left "></i> </div>
               <div class="next-destination-slider"> <i class="fa-solid fa-chevron-right"></i></div>
            </div>
            <div class="container px-md-4">
                <div class="row">
                    <div class="col-12">
                        <div class="destination-slider">
                            @foreach($bike_loc as $key => $row)
                                <div>
                                    <form action="{{ route('bike.list', $row[0]->id) }}" method="get" id="destinat_form{{ $row[0]->id }}">
                                        <input type="hidden" name="destination" value="{{ $row[0]->bike_state->id }}"><br><br>
                                            <div class="small-box border-radius-10 text-center mx-2">
                                                <a class="box" href="javascript:submit({{ $row[0]->id }})">
                                                    <div class="img">
                                                        <img src="{{ asset('/images/destination-1.png') }}" alt=""
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="bg-yellow py-3">
                                                        <p class="primary-description text-center">{{ $row[0]->bike_state->name }}</p>
                                                    </div>
                                                </a>
                                            </div>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-10 pt-sm-3">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 align-items-center">
                    <div class="col">
                        <img src="{{ asset('/images/ride.png') }}" alt="ride" class="img-fluid">
                    </div>
                    <div class="col">
                        <span class="fs-60 text-uppercase text-white fw-bold">
                            Get out and Ride
                        </span>
                        <p class="fs-30 text-yellow fw-bold">
                            Join the Fastest Growing Motorcycle sharing community on the planet.
                        </p>
                        <ul class="details pt-lg-5 pt-3">
                            <li>
                                <img src="{{ asset('/images/rating.png') }}" alt="" class="img-fluid"> <span
                                    class="ps-2">5 Star Reviews</span>
                            </li>
                            <li>
                                <img src="{{ asset('/images/user.png') }}" alt="" class="img-fluid"> <span
                                    class="ps-2">Users and Reviews</span>
                            </li>
                            <li>
                                <img src="{{ asset('/images/verification.png') }}" alt="" class="img-fluid"> <span
                                    class="ps-2">Verification</span>
                            </li>
                            <li>
                                <img src="{{ asset('/images/umbrella.png') }}" alt="" class="img-fluid"> <span
                                    class="ps-2">Insurance</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-10 pt-sm-3">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col-12 text-center pb-lg-5 pb-3">
                        <h2 class="fs-48">
                            Choose Your Brand
                        </h2>
                        <p>
                            Explore the world's largest car sharing marketplace
                        </p>
                    </div>
                    @foreach ($brand as $row)
                    <div class="col mb-lg-0 mb-3">
                        <form action="{{ route('bike.list', $row->id) }}" method="get" id="brand_form{{ $row->id }}">
                            <input type="hidden" name="brand" value="{{ $row->slug }}"><br><br>
                                <a class="box brands_box" href="javascript:submitBrand({{ $row->id }})">
                                <img src="{{ asset('storage/' . $row->image) }}" alt="" class="img-fluid w-100"
                                    style="height: 424px">
                                <p class="mb-0 text-center text-darke bg-yellow fs-1 py-3">{{ $row->name }}</p>
                            </a>
                        </form>
                    </div>
                    {{-- <div class="col">
                        <a class="box" href="#">
                            <img src="{{ asset('/images/brand-1.png') }}" alt="" class="img-fluid">
                            <p class="mb-0 text-center text-darke bg-yellow fs-1 py-3">Ducati</p>
                        </a>
                    </div> --}}
                    @endforeach
                </div>
            </div>
        </section>

        <section class="pt-10 pt-sm-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 text-center pb-lg-5 pb-3">
                        <h2 class="fs-48">
                            See How It Works
                        </h2>
                        <p>
                            Explore the world's largest car sharing marketplace
                        </p>
                    </div>
                    <div class="col-12 col-lg-5">
                        <ol class="custom-num">
                            <li>
                                <span class="fs-4 text-white">Find your motorcycle</span>
                                <p class=" text-white pt-2">
                                    Search from thousands of motorcycles all over the country. Looking for a particular
                                    brand or location? We’ve probably got it.
                                </p>
                            </li>
                            <li>
                                <span class="fs-4 text-white">Find your motorcycle</span>
                                <p class=" text-white pt-2">
                                    Search from thousands of motorcycles all over the country. Looking for a particular
                                    brand or location? We’ve probably got it.
                                </p>
                            </li>
                            <li>
                                <span class="fs-4 text-white">Find your motorcycle</span>
                                <p class=" text-white pt-2">
                                    Search from thousands of motorcycles all over the country. Looking for a particular
                                    brand or location? We’ve probably got it.
                                </p>
                            </li>
                        </ol>
                    </div>
                    <div class="col col-lg-7">
                        <img src="{{ asset('/images/works.png') }}" alt="" class="w-100 rounded-15">
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5 bg-yellow py-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center pb-lg-5 pb-3">
                        <h2 class="fs-48 text-dark">
                            Customers Testimonials
                        </h2>
                        <p class="text-dark">
                            Explore the world's largest car sharing marketplace
                        </p>
                    </div>
                    <div class="col-12">
                        <div class="testimonial-slider testimonial">
                            @foreach ($test as $te)
                            
                                <div>
                                    <div class="single">
                                        
                                        <img src="{{ asset('storage/' . $te->avatar) }}" width="88px" height="88px" alt=""
                                            class="rounded-pill">
    
                                        <div class="rating pt-4">
                                            @if ($te->rating == 1)
                                                <i class="fa-solid fa-star"></i>
                                            @endif
                                            @if ($te->rating == 2)
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            @endif
                                            @if ($te->rating == 3)
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            @endif
                                            @if ($te->rating == 4)
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            @endif
                                            @if ($te->rating == 5)
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            @endif
                                        </div>
                                        
    
                                        <p class=" fst-italic py-3">{{ \Illuminate\Support\Str::limit($te->description, 120, '...') }}</p>
    
                                        <p class="author fs-4">{{ $te->name }}</p>
                                        <span class="designation fs-14 fw-normal">{{ $te->title }}</span>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="single">
                                <img src="{{ asset('/images/testimonials.png') }}" alt="" class="rounded-pill">

                                <div class="rating pt-4">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>

                                <p class=" fst-italic py-3">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, Lorem Ipsum is simply
                                    dummy text of the printing and typesetting
                                </p>

                                <p class="author fs-4">Maxwell</p>
                                <span class="designation fs-14 fw-normal">Art Director</span>
                            </div>
                            <div class="single">
                                <img src="{{ asset('/images/testimonials.png') }}" alt="" class="rounded-pill">

                                <div class="rating pt-4">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>

                                <p class=" fst-italic py-3">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, Lorem Ipsum is simply
                                    dummy text of the printing and typesetting
                                </p>

                                <p class="author fs-4">Maxwell</p>
                                <span class="designation fs-14 fw-normal">Art Director</span>
                            </div>
                            <div class="single">
                                <img src="{{ asset('/images/testimonials.png') }}" alt="" class="rounded-pill">

                                <div class="rating pt-4">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>

                                <p class=" fst-italic py-3">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, Lorem Ipsum is simply
                                    dummy text of the printing and typesetting
                                </p>

                                <p class="author fs-4">Maxwell</p>
                                <span class="designation fs-14 fw-normal">Art Director</span>
                            </div>
                            <div class="single">
                                <img src="{{ asset('/images/testimonials.png') }}" alt="" class="rounded-pill">

                                <div class="rating pt-4">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>

                                <p class=" fst-italic py-3">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, Lorem Ipsum is simply
                                    dummy text of the printing and typesetting
                                </p>

                                <p class="author fs-4">Maxwell</p>
                                <span class="designation fs-14 fw-normal">Art Director</span>
                            </div>
                            <div class="single">
                                <img src="{{ asset('/images/testimonials.png') }}" alt="" class="rounded-pill">

                                <div class="rating pt-4">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>

                                <p class=" fst-italic py-3">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, Lorem Ipsum is simply
                                    dummy text of the printing and typesetting
                                </p>

                                <p class="author fs-4">Maxwell</p>
                                <span class="designation fs-14 fw-normal">Art Director</span>
                            </div>
                            <div class="single">
                                <img src="{{ asset('/images/testimonials.png') }}" alt="" class="rounded-pill">

                                <div class="rating pt-4">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>

                                <p class=" fst-italic py-3">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, Lorem Ipsum is simply
                                    dummy text of the printing and typesetting
                                </p>

                                <p class="author fs-4">Maxwell</p>
                                <span class="designation fs-14 fw-normal">Art Director</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-10 pb-5 pt-sm-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 text-center pb-lg-5 pb-3">
                        <h2 class="fs-48">
                            Frequently Asked Questions
                        </h2>
                        <p>
                            Explore the world's largest car sharing marketplace
                        </p>
                    </div>
                    <div class="col-lg-7">
                        <div class="accordion accordion-flush" id="faq">
                            @foreach ($faqs as $row)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne{{ $row->id }}" aria-expanded="false"
                                            aria-controls="flush-collapseOne{{ $row->id }}">
                                            <i class="fa-solid fa-circle-question"></i> <span class="ps-2">
                                                {{ $row->question }}</span>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne{{ $row->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#faq">
                                        <div class="accordion-body">
                                            <p>{{ $row->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        <i class="fa-solid fa-circle-question"></i> <span class="ps-2"> Lorem
                                            Ipsum is simply dummy text of the printing and typesettin</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingTwo" data-bs-parent="#faq">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, Lorem
                                            Ipsum is simply dummy
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        <i class="fa-solid fa-circle-question"></i> <span class="ps-2"> Lorem
                                            Ipsum is simply dummy text of the printing and typesettin</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingThree" data-bs-parent="#faq">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, Lorem
                                            Ipsum is simply dummy
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseFour" aria-expanded="false"
                                        aria-controls="flush-collapseFour">
                                        <i class="fa-solid fa-circle-question"></i> <span class="ps-2"> Lorem
                                            Ipsum is simply dummy text of the printing and typesettin</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingFour" data-bs-parent="#faq">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, Lorem
                                            Ipsum is simply dummy
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseFive" aria-expanded="false"
                                        aria-controls="flush-collapseFive">
                                        <i class="fa-solid fa-circle-question"></i> <span class="ps-2"> Lorem
                                            Ipsum is simply dummy text of the printing and typesettin</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseFive" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingFive" data-bs-parent="#faq">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, Lorem
                                            Ipsum is simply dummy
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseSix" aria-expanded="false"
                                        aria-controls="flush-collapseSix">
                                        <i class="fa-solid fa-circle-question"></i> <span class="ps-2"> Lorem
                                            Ipsum is simply dummy text of the printing and typesettin</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseSix" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingSix" data-bs-parent="#faq">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, Lorem
                                            Ipsum is simply dummy
                                        </p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <img src="{{ asset('/images/faq.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

    </main>
    
    <script>
        function submit(id)
        {
            document.getElementById("destinat_form"+id).submit();
        }
        function submitBrand(id)
        {
            document.getElementById("brand_form"+id).submit();
        }
    </script>
@endsection
