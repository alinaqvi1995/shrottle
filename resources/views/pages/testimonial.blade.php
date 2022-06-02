@extends('layouts.app')

@section('content')
    <main class="faq">
        <section class="inner-banner text-center text-uppercase ">
            <div class="container">
                <div class="row pt-12 pt-sm-12 align-items-center justify-content-center">
                    <div class="col">
                        <h1 class="fs-1 fw-bold">TESTIMONIALS</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="pt-10 pb-5">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center pb-3">
                        <h2 class="fs-48">
                            What Our Client Says
                        </h2>
                    </div>
                </div>

                <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 div">
                    @foreach ($test as $te)
                        <div class="col testimonial ">
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

                                <p class=" fst-italic py-3 addReadMore showlesscontent">{{ $te->description }}</p>

                                <p class="author fs-4 ">{{ $te->name }}</p>
                                <span class="designation fs-14 fw-normal">{{ $te->title }}</span>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col testimonial">
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
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, Lorem Ipsum is simply dummy
                                text of the printing and typesetting
                            </p>

                            <p class="author fs-4">Maxwell</p>
                            <span class="designation fs-14 fw-normal">Art Director</span>
                        </div>
                    </div>
                    <div class="col testimonial">
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
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, Lorem Ipsum is simply dummy
                                text of the printing and typesetting
                            </p>

                            <p class="author fs-4">Maxwell</p>
                            <span class="designation fs-14 fw-normal">Art Director</span>
                        </div>
                    </div>
                    <div class="col testimonial">
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
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, Lorem Ipsum is simply dummy
                                text of the printing and typesetting
                            </p>

                            <p class="author fs-4">Maxwell</p>
                            <span class="designation fs-14 fw-normal">Art Director</span>
                        </div>
                    </div>
                    <div class="col testimonial">
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
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, Lorem Ipsum is simply dummy
                                text of the printing and typesetting
                            </p>

                            <p class="author fs-4">Maxwell</p>
                            <span class="designation fs-14 fw-normal">Art Director</span>
                        </div>
                    </div>
                    <div class="col testimonial">
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
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, Lorem Ipsum is simply dummy
                                text of the printing and typesetting
                            </p>

                            <p class="author fs-4">Maxwell</p>
                            <span class="designation fs-14 fw-normal">Art Director</span>
                        </div>
                    </div>
                    <div class="col testimonial">
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
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, Lorem Ipsum is simply dummy
                                text of the printing and typesetting
                            </p>

                            <p class="author fs-4">Maxwell</p>
                            <span class="designation fs-14 fw-normal">Art Director</span>
                        </div>
                    </div>
                    <div class="col testimonial">
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
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, Lorem Ipsum is simply dummy
                                text of the printing and typesetting
                            </p>

                            <p class="author fs-4">Maxwell</p>
                            <span class="designation fs-14 fw-normal">Art Director</span>
                        </div>
                    </div>
                    <div class="col testimonial">
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
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, Lorem Ipsum is simply dummy
                                text of the printing and typesetting
                            </p>

                            <p class="author fs-4">Maxwell</p>
                            <span class="designation fs-14 fw-normal">Art Director</span>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>

    </main>
@endsection
