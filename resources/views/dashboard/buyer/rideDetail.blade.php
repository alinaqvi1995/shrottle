@extends('dashboard.buyer.layout.app')

@section('page_title', 'Cobra Rider')

@section('head_style')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

    @section('content')

        {{-- <section> --}}
            <div class="container">
                <div class="card" style="width: 100%">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 mb-3" style="margin-top: 1rem !important">
                                <div class="col-md-6 mb-3">
                                    <h6 class="card-subtitle">Bike</h6>
                                    <h2 class=" card-text">{{ $leads->bike->title }}</h>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3" style="margin-top: 1rem !important">
                                <div class="col-md-6 mb-3">
                                    <h6 class="card-subtitle">Rent</h6>
                                    <h2 class=" card-text">{{ '$'.$leads->bike->rentPerDay }}</h>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Bike</h6>
                                <p class=" card-text">{{ $leads->bike->title }}</p>
                                <p class=" card-text">{{ $leads->bike->bike_brand->name }}</p>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Vendor</h6>
                                <p class=" card-text">{{ $leads->bike->seller->name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Pickup Date</h6>
                                <p class=" card-text">{{ $leads->pickup_date }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Pickup Location</h6>
                                <p class=" card-text">{{ $leads->pickup_loc }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Dropoff Date</h6>
                                <p class=" card-text">{!! $leads->dropoff_date !!}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Dropoff Location</h6>
                                <p class=" card-text">{!! $leads->dropoff_loc !!}</p>
                            </div>
                        </div>
                    </div>
                  </div>
           </div>
        {{-- </section> --}}

    @endsection

@section('bottom_script')
@endsection
