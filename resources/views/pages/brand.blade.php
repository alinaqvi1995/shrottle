@extends('layouts.app')

@section('content')
    <main class="faq">
        <section class="inner-banner text-center text-uppercase ">
            <div class="container">
                <div class="row pt-12 pt-sm-12 align-items-center justify-content-center">
                    <div class="col">
                        <h1 class="fs-1 fw-bold">All Brands</h1>
                    </div>
                </div>
            </div>
        </section>

        {{-- <section class="pt-lg-5 pt-3">
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
        </section> --}}


        <section class="pt-10 pb-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
                    <div class="col-12 text-center">
                        <h2 class="fs-48">
                            Choose Your Brand
                        </h2>
                        <p>
                            Explore the world's largest car sharing marketplace
                        </p>
                    </div>
                    @foreach ($brand as $row)
                    <form action="{{ route('bike.list') }}" method="get" id="branfs_form{{ $row->id }}">
                        <input type="hidden" name="brand" value="{{ $row->slug }}"><br><br>
                        <div class="col mb-4 mb-md-0">
                            <a class="box brands_box" href="javascript:submit({{ $row->id }})">
                                <img src="{{ asset('storage/' . $row->image) }}" alt="" class="img-fluid w-100 mh-100" >
                                <p class="mb-0 text-center text-darke bg-yellow py-3 text-uppercase fw-bold">{{ $row->name }}</p>
                            </a>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </section>

    

    </main>
    <script>
        function submit(id)
        {
            
            document.getElementById("branfs_form"+id).submit();
        }
    </script>
@endsection