@extends('dashboard.seller.layout.app')

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
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">


                    <div class="col-md-6 mb-3">
                        <h6 class="card-subtitle">Request By</h6>
                        <p class=" card-text">{{ $leads->user->buyer->name }}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <h6 class="card-subtitle">Bike</h6>
                        <p class=" card-text">{{ $leads->bike->title }}</p>
                    </div>

                    @if ($leads->pickup_loc != null)
                        <div class="col-md-6 mb-3">
                            <h6 class="card-subtitle">Pickup Location</h6>
                            <p class=" card-text">{{ $leads->pickup_loc }}</p>
                        </div>
                    @endif

                    @if ($leads->dropoff_loc != null)
                        <div class="col-md-6 mb-3">
                            <h6 class="card-subtitle">Dropoff Location</h6>
                            <p class=" card-text">{{ $leads->dropoff_loc }}</p>
                        </div>
                    @endif

                    @if ($leads->pickup_date != null)
                        <div class="col-md-6 mb-3">
                            <h6 class="card-subtitle">Pickup Date/Time</h6>
                            <p class=" card-text">{{ $leads->pickup_date }} {{ $leads->pickup_time }}</p>
                        </div>
                    @endif

                    @if ($leads->dropoff_date != null)
                        <div class="col-md-6 mb-3">
                            <h6 class="card-subtitle">Dropoff Date/Time</h6>
                            <p class=" card-text">{{ $leads->dropoff_date }} {{ $leads->dropoff_time }}</p>
                        </div>
                    @endif

                    @if ($leads->message != null)
                        <div class="col-md-10">
                            <h6 class="card-subtitle">Message</h6>
                            <p class=" card-text">{!! $leads->message !!}</p>
                        </div>
                    @endif
                </div>
            </div>
            @if($leads->dropoff_date >= now()->format('m/d/Y') AND $leads->status != 2 AND $leads->vendor_status != 'Cancel')
                    <a href="{{ route('seller.bikes.book', $leads->id) }}" onclick="return confirm('Cancel booking?');"
                        class="btn btn-danger"> Cancel Booking</a>
                {{-- @if ($leads->status == 1)
                @else
                    <a href="" class="btn btn-primary"> Booking Cancelled</a>
                @endif --}}
            @endif
        </div>
    </div>
    {{-- </section> --}}

@endsection

@section('bottom_script')
@endsection
