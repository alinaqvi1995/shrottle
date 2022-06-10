@extends('layouts.app')

@section('content')
    <main class="faq bike-listing">
        <section class="inner-banner text-center text-uppercase ">
            <div class="container">
                <div class="row pt-12 align-items-center justify-content-center">
                    <div class="col">
                        <h1 class="fs-1 fw-bold">Bikes for rent</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="pb-5">
            <div class="container">
                <form action="{{ route('bike.list') }}" method="get">
                    <div class="row pt-5 mb-5">
                        <input type="hidden" name="filter" value="filter">
                        <div class="col-xl-4 col-lg-5 col-md-6 mb-3 mb-xl-0">
                            <div class="listing-input-wrap position-relative">
                                <img src="{{ asset('/images/calendar_inner.png') }}" alt="">
                                <input type="text" name="datetimes" placeholder="When are you riding?" autocomplete="off"
                                    class="form-control" required>
                                <!--<input type="text" class="form-control" placeholder="When are you riding?">-->
                            </div>
                        </div>
                        <div class="col-xl col-lg-4 col-md-6 mb-3 mb-xl-0">
                            <div class="listing-input-wrap position-relative">
                                <select name="purpose" class="form-select">
                                    <option selected value="">Bike Type</option>
                                    @foreach ($purpose as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl col-lg-3 col-md-6 mb-3 mb-xl-0">
                            <div class="listing-input-wrap position-relative">
                                <select name="brands" class="form-select">
                                    <option selected value="">Make</option>
                                    @foreach ($brands as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl col-lg-4 col-md-6 mb-3 mb-xl-0">
                            <div class="listing-input-wrap position-relative">
                                <select name="location" class="form-select">
                                    <option selected value="">Location</option>
                                    @foreach ($location as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl col-lg-4 col-md-6">
                            <button type="submit" class="btn btn-primary button-2 fw-normal height-50 w-100">Filter</button>
                        </div>
                </form>
            </div>
            @if (count($bike) > 0)
                <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2">
                    @foreach ($bike as $row)
                        <div class="col mb-5">
                            <div class="bike-listing-box">
                                <a href="{{ route('bike.details', $row->slug) }}" class="d-block">
                                    <div class="img">
                                        <img src="{{ asset('storage/' . $row->fea_image) }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="content row g-0">
                                        <div class="col-7">
                                            <p>{{ $row->bike_brand->name }}</p>
                                            <h5 class="color-light-white">{{ $row->bike_type->name }}</h5>
                                            <p class="location fs-14"> <i class="fa-solid fa-location-dot color-yellow"></i>
                                                {{ $row->bike_country->sortname }}, {{ $row->bike_state->name }}</p>
                                        </div>
                                        <div class="col-5 align-self-center">
                                            <p class="bg-yellow p-3 color-dark text-darke listing-price">
                                                ${{ $row->rentPerDay }}/ <span>Per
                                                    Day</span></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <form method="get" action="{{ route('bike.list') }}">
                            <input type="hidden" name="load_more" value="all_bikes">
                            <button href="" class="btn btn-primary button-2 fw-normal py-3 px-5 fs-5 fw-600">Load More <span
                                    class="lds-dual-ring"><i class="fa-solid fa-spinner"></i></span> </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="mb-5">
                    <h2>No Matches Found</h2>
                </div>
            @endif
            </div>
        </section>
    </main>
    <script>
        // hiding selected dates
        var js_json_obt = @json($all_dates ?? '');
        // console.log(js_json_obt);

        $(function() {
            $('input[name="datetimes"]').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                // maxDate: new Date(),
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                },
                isInvalidDate: function(date) {
                    if (js_json_obt.includes(date.format('YYYY-MM-DD'))) {
                        return true;
                    }
                }
            });
            $('input[name="datetimes"]').val('');
            $('input[name="datetimes"]').attr("placeholder", "Choose Pickup And Dropoff Date/Time");
        });
    </script>

@endsection
