@extends('layouts.app')

@section('content')
    <main class="faq">
        <section class="inner-banner text-center text-uppercase ">
            <div class="container">
                <div class="row pt-12 pt-sm-12 align-items-center justify-content-center">
                    <div class="col">
                        <h1 class="fs-1 fw-bold">insurance & protection</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="pt-10 pb-5">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-8 text-center pb-lg-5 pb-3">
                        <h2 class="fs-48 text-uppercase fw-bold pb-3">
                            For international travelers
                        </h2>
                        <p>
                            US insurance can be difficult to navigate, so we make it easy. We offer both damage and
                            liability insurance that will cover you in the rare case that there is an incident. As long as
                            you can prove you can legally ride a motorcycle in your home country,
                            you can rent with us.
                        </p>
                    </div>
                    <hr>
                </div>

                <div class="row row-cols-1 row-cols-md-2 py-3">
                    @foreach ($bike as $row)
                        <div class="col mb-4 mb-md-0">
                            <a class="box" href="#">
                                <img src="{{ asset('storage/' . $row->fea_image) }}" alt="" class="img-fluid w-100" style="height: 424px">
                                <div class="mb-0 text-center  bg-yellow py-3 px-3">
                                    <p class="fs-1 text-darke">
                                        {{ $row->bike_brand->name }}
                                    </p>

                                    <p class=" text-darke lh-30 py-3">
                                        We know that stuff can happen, so we’re covering you. We offer daily insurance rates
                                        to
                                        cover you for up to $25K of motorcycle damage that could happen during your ride.
                                        You’re
                                        automatically covered for minimum state liability, but can purchase up to
                                        $1M in coverage if you choose.
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    {{-- <div class="col">
                        <a class="box" href="#">
                            <img src="{{ asset('/images/brand-1.png') }}" alt="" class="img-fluid">
                            <div class="mb-0 text-center  bg-yellow py-3 px-3">
                                <p class="fs-1 text-darke">
                                    Ducati
                                </p>

                                <p class=" text-darke lh-30 py-3">
                                    We know that stuff can happen, so we’re covering you. We offer daily insurance rates to
                                    cover you for up to $25K of motorcycle damage that could happen during your ride. You’re
                                    automatically covered for minimum state liability, but can purchase up to
                                    $1M in coverage if you choose.
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="box" href="#">
                            <img src="{{ asset('/images/brand-1.png') }}" alt="" class="img-fluid">
                            <div class="mb-0 text-center  bg-yellow py-3 px-3">
                                <p class="fs-1 text-darke">
                                    Ducati
                                </p>

                                <p class=" text-darke lh-30 py-3">
                                    We know that stuff can happen, so we’re covering you. We offer daily insurance rates to
                                    cover you for up to $25K of motorcycle damage that could happen during your ride. You’re
                                    automatically covered for minimum state liability, but can purchase up to
                                    $1M in coverage if you choose.
                                </p>
                            </div>
                        </a>
                    </div> --}}
                </div>

                <div class="row row-cols-1 row-cols-3 pt-5">
                    <div class="col-12 text-center pb-lg-5 pb-3">
                        <h2 class="fs-48 text-uppercase fw-bold">
                            Insurance Options
                        </h2>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                    <div class="col mb-4 mb-lg-0">
                        <div class="option bg-graphite px-md-5 py-md-4 p-2">
                            <img src="{{ asset('/images/icon1.png') }}" alt="icon1" class="img-fluid">
                            <p class="text-white fs-4 py-2">Premium</p>
                            <p class="text-uppercase  py-2">Ride the world with the strongest protection plan</p>
                            <ul>
                                <li>
                                    Up to $1M of liability insurance $25K of damage and theft cover
                                </li>
                                <li>
                                    $25K of damage and theft coverage
                                </li>
                                <li>
                                    $1,000 max out-of-pocket for damage ($2,500 for theft)
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col mb-4 mb-lg-0">
                        <div class="option bg-graphite px-md-5 py-md-4 p-2">
                            <img src="{{ asset('/images/icon2.png') }}" alt="icon1" class="img-fluid">
                            <p class="text-white fs-4 py-2">Standard</p>
                            <p class="text-uppercase  py-2">Relax and ride with solid coverage</p>
                            <ul>

                                <li>
                                    $25K of damage and theft coverage
                                </li>
                                <li>
                                    $1,000 max out-of-pocket for damage ($2,500 for theft)
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="option bg-graphite px-md-5 py-md-4 p-2">
                            <img src="{{ asset('/images/icon3.png') }}" alt="icon1" class="img-fluid">
                            <p class="text-white fs-4 py-2">Minimum</p>
                            <p class="text-uppercase  py-2">Basic coverage while saving money</p>
                            <ul>
                                <li>
                                    State minumum liability insurance $25K of damage coverage $2,50
                                </li>
                                <li>
                                    $25K of damage and theft coverage
                                </li>
                                <li>
                                    $1,000 max out-of-pocket for damage ($2,500 for theft)
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>
@endsection
