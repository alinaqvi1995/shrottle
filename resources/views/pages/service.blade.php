@extends('layouts.app')

@section('content')
    <main class="faq">
        <section class="inner-banner text-center text-uppercase ">
            <div class="container">
                <div class="row pt-12 pt-sm-12 align-items-center justify-content-center">
                    <div class="col">
                        <h1 class="fs-1 fw-bold">Services</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-lg-5 pt-3">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-9 text-center">
                        <h2 class="fs-48">
                            Join the fastest growing motorcycle sharing community on the planet
                        </h2>
                        <p class="pt-3">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                            containing Lorem Ipsum passages, and more
                            recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                            Ipsum.
                        </p>
                    </div>
                </div>

                <div class="row pt-5 row-cols-lg-2 row-cols-1 align-items-center ">
                    <div class="col mb-4 mb-lg-0">
                        <h2 class="fs-48">
                            Ride Motorcycle Rentals and Tours
                        </h2>
                        <p class="pt-3">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                            containing Lorem Ipsum passages, and more
                            recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                            Ipsum.
                        </p>
                    </div>
                    <div class="col">
                        <img src="{{ asset('/images/services.png') }}" alt="" class="img-fluid rounded-15">
                    </div>
                </div>

            </div>
        </section>


        <section class="pt-10">
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
                        <form action="{{ route('bike.list', $row->id) }}" method="get" id="destinat_form{{ $row->id }}">
                            <input type="hidden" name="brand" value="{{ $row->slug }}"><br><br>
                                <a class="box brands_box" href="javascript:submit({{ $row->id }})">
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

        <section class="destination-section pt-10 pb-5">
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
                <i class="fa-solid fa-chevron-left prev-destination-slider "></i>
                <i class="fa-solid fa-chevron-right next-destination-slider"></i>
            </div>
            <div class="container px-md-4">
                <div class="row">
                    <div class="col-12">
                        <div class="destination-slider">
                            <div>
                                <div class="small-box border-radius-10 text-center mx-2">
                                    <a href="" class="d-block">
                                        <div class="img">
                                            <img src="{{ asset('/images/destination-1.png') }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="bg-yellow py-3">
                                            <p class="primary-description text-center">Victoria, BC</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <div class="small-box border-radius-10 text-center mx-2">
                                    <a href="" class="d-block">
                                        <div class="img">
                                            <img src="{{ asset('/images/destination-2.png') }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="bg-yellow py-3">
                                            <p class="primary-description  text-center">Vancouver, BC</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <div class="small-box border-radius-10 text-center mx-2">
                                    <a href="" class="d-block">
                                        <div class="img">
                                            <img src="{{ asset('/images/destination-3.png') }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="bg-yellow py-3">
                                            <p class="primary-description  text-center">Richmond, BC</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <div class="small-box border-radius-10 text-center mx-2">
                                    <a href="" class="d-block">
                                        <div class="img">
                                            <img src="{{ asset('/images/destination-4.png') }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="bg-yellow py-3">
                                            <p class="primary-description  text-center">Burnaby, BC</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <div class="small-box border-radius-10 text-center mx-2">
                                    <a href="" class="d-block">
                                        <div class="img">
                                            <img src="{{ asset('/images/destination-4.png') }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="bg-yellow py-3">
                                            <p class="primary-description  text-center">Burnaby, BC</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
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
    </script>
@endsection
