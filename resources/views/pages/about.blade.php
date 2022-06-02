@extends('layouts.app')

@section('content')
    <main class="faq">
        <section class="inner-banner text-center text-uppercase ">
            <div class="container">
                <div class="row pt-12 pt-sm-12 align-items-center justify-content-center">
                    <div class="col">
                        <h1 class="fs-1 fw-bold">About Us</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-3 pt-5 text-center">

                    <div class="col">
                        <div class="option py-2 px-lg-4">
                            <img src="{{ asset('/images/icon1.png') }}" alt="icon1" class="img-fluid">
                            <p class="text-white fs-4 py-2 fw-bold">Smart Mobility With <br> Big Savings</p>
                            <p class="text-uppercase  py-2">Labore tempore usmod sed incididunt labore et dolore magna
                                aliqua. Ut enim ad minim veniam quis nostrud.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="option py-2 px-lg-4">
                            <img src="{{ asset('/images/icon2.png') }}" alt="icon1" class="img-fluid">
                            <p class="text-white fs-4 py-2 fw-bold">Designed For The <br> Modern World</p>
                            <p class="text-uppercase  py-2">Labore tempore usmod sed incididunt labore et dolore magna
                                aliqua. Ut enim ad minim veniam quis nostrud.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="option py-2 px-lg-4">
                            <img src="{{ asset('/images/icon3.png') }}" alt="icon1" class="img-fluid">
                            <p class="text-white fs-4 py-2 fw-bold">Insured & Licensed <br> Rental Services</p>
                            <p class="text-uppercase  py-2">Labore tempore usmod sed incididunt labore et dolore magna
                                aliqua. Ut enim ad minim veniam quis nostrud.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col mb-3 mb-lg-0">
                        <p class="fs-48 fw-bold lh-60 text-white mb-lg-4 mb-3">
                            Renroll - The company to offer the best scooter & bike rental services
                        </p>

                        <img src="{{ asset('/images/about-3.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col option">
                        <div class="row row-cols-2  pb-3">
                            <div class="col"><img src="{{ asset('/images/about-1.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col"><img src="{{ asset('/images/about-2.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>

                        <p class="fs-48 fw-bold text-white">
                            Renting Service Features
                        </p>

                        <p class="">
                            Consectetur adipisicing elit sed eiusmod tempor dolore magna aliqua ad minim veniam quis nostrud
                            exercitation aliquip.
                        </p>

                        <ul class="pt-3">

                            <li class="pb-3">
                                Free booking cancellation up to 15 hours We offer 24/7 road ren
                            </li>
                            <li class="pb-3">
                                We offer 24/7 road rental assistance
                            </li>
                            <li class="pb-3">
                                More than 350.000 satisfied customers
                            </li>
                            <li class="pb-3">
                                Fleet of over 8,000 brand new scooters & bikes
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-10 pb-lg-5 pb-3">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 align-items-center">

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
                    <div class="col">
                        <img src="{{ asset('/images/ride.png') }}" alt="ride" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
