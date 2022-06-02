@extends('layouts.app')

@section('content')
    <main class="faq">
        <section class="inner-banner text-center text-uppercase ">
            <div class="container">
                <div class="row pt-12 align-items-center justify-content-center">
                    <div class="col">
                        <h1 class="fs-1 fw-bold">became a host</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="pt-10 pb-5">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-10 text-center pb-lg-5 pb-3">
                        <h2 class="fs-48 text-uppercase fw-600 pb-2">
                            Accelerate Your Entrepreneurship
                        </h2>
                        <p class="text-yellow fs-4">
                            Start building a small car sharing business with us
                        </p>
                        <p class=" pt-3 pb-5">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                            containing Lorem Ipsum passages, and more
                            recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                            Ipsum.
                        </p>

                        <img src="{{ asset('/images/host.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <a class="button-2 btn-become-host text-uppercase fs-2 shadow" href="{{ route('register') }}">Register
                        Now</a>
                    </div>
                </div>
                {{-- @if (Auth::check())
                    @if (auth()->user()->role == 'buyer')
                        <button class="btn button-2 btn-primary fs-4 fw-600 w-100 mb-3">Rent Now</button>
                    @elseif (auth()->user()->role == 'admin' || auth()->user()->role == 'seller')
                        <a class="btn button-2 btn-primary fs-4 fw-600 w-100 mb-3" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Please
                            Login As A Renter</a>
                    @endif
                @else --}}
                    
                {{-- @endif --}}
            </div>
        </section>

        <section class="bg-darke">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-3 pt-5 text-center">
                    <div class="col-lg-12">
                        <h2 class="fs-48 text-uppercase fw-600 pb-2">
                            Build a business that’s...
                        </h2>
                    </div>
                    <div class="col">
                        <div class="option py-4 px-lg-4">
                            <img src="{{ asset('/images/icon1.png') }}" alt="icon1" class="img-fluid">
                            <p class="text-white fs-4 py-2 fw-bold">Scalable</p>
                            <p class="text-uppercase  py-2">Labore tempore usmod sed incididunt labore et dolore magna
                                aliqua. Ut enim ad minim veniam quis nostrud.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="option py-4 px-lg-4">
                            <img src="{{ asset('/images/icon2.png') }}" alt="icon1" class="img-fluid">
                            <p class="text-white fs-4 py-2 fw-bold">Accessible</p>
                            <p class="text-uppercase  py-2">Labore tempore usmod sed incididunt labore et dolore magna
                                aliqua. Ut enim ad minim veniam quis nostrud.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="option py-4 px-lg-4">
                            <img src="{{ asset('/images/icon3.png') }}" alt="icon1" class="img-fluid">
                            <p class="text-white fs-4 py-2 fw-bold">Flexible</p>
                            <p class="text-uppercase  py-2">Labore tempore usmod sed incididunt labore et dolore magna
                                aliqua. Ut enim ad minim veniam quis nostrud.</p>
                        </div>
                    </div>
                </div>

                <div class="row pt-5">
                    <div class="col-lg-12">
                        <h2 class="fs-48 fw-600 pb-lg-5 pb-3">
                            Entrepreneurs of all <br> experience levels welcome
                        </h2>
                    </div>
                    <div class="col-lg-5">
                        <ul>
                            <li class="option h-auto py-3">
                                <p class="text-white fs-2 py-1 fw-bold">$10,516</p>
                                <p class="">Average annual income of 1 Motorcycle*</p>
                            </li>
                            <li class="option h-auto py-3">
                                <p class="text-white fs-2 py-1 fw-bold">$10,516</p>
                                <p class="">Average annual income of 1 Motorcycle*</p>
                            </li>
                            <li class="option h-auto py-3">
                                <p class="text-white fs-2 py-1 fw-bold">$10,516</p>
                                <p class="">Average annual income of 1 Motorcycle*</p>
                            </li>
                            <li class="option h-auto py-3">
                                <p class="text-white fs-2 py-1 fw-bold">$10,516</p>
                                <p class="">Average annual income of 1 Motorcycle*</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-7">
                        <img src="{{ asset('/images/host-1.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="host-3 border-top py-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col-lg-12">
                        <h2 class="fs-48 text-center fw-600 pb-lg-5 pb-4">
                            Built-in infrastructure to get <br> you up & running
                        </h2>
                    </div>
                    <div class="col">
                        <div class="bg-darke p-5 d-flex mb-lg-4 mb-3">
                            <img src="{{ asset('/images/built-1.png') }}" class="img-fluid fit-none" alt="">
                            <div class="ps-3">
                                <span class="fs-4 text-white fw-600">
                                    Insurance included
                                </span>
                                <p class="lh-30">
                                    Rest easy knowing you’re covered with $750,000 in liability insurance from Travelers,
                                    plus you choose from an array
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bg-darke p-5 d-flex mb-lg-4 mb-3">
                            <img src="{{ asset('/images/built-2.png') }}" class="img-fluid fit-none" alt="">
                            <div class="ps-3">
                                <span class="fs-4 text-white fw-600">
                                    Safety & support
                                </span>
                                <p class="lh-30">
                                    Rest easy knowing you’re covered with $750,000 in liability insurance from Travelers,
                                    plus you choose from an array
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bg-darke p-5 d-flex mb-lg-4 mb-3">
                            <img src="{{ asset('/images/built-3.png') }}" class="img-fluid fit-none" alt="">
                            <div class="ps-3">
                                <span class="fs-4 text-white fw-600">
                                    Demand generation
                                </span>
                                <p class="lh-30">
                                    Rest easy knowing you’re covered with $750,000 in liability insurance from Travelers,
                                    plus you choose from an array
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bg-darke p-5 d-flex mb-lg-4 mb-3">
                            <img src="{{ asset('/images/built-4.png') }}" class="img-fluid fit-none" alt="">
                            <div class="ps-3">
                                <span class="fs-4 text-white fw-600">
                                    An easy-to-use app
                                </span>
                                <p class="lh-30">
                                    Rest easy knowing you’re covered with $750,000 in liability insurance from Travelers,
                                    plus you choose from an array
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
