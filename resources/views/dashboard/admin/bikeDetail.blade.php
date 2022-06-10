@extends('dashboard.admin.layout.app')

@section('page_title', 'Shrottle - Rent A Bike')

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
                            <div class="col-md-2 mb-3">
                                @if($bike->fea_image != NULL)
                                    <div id="imagePreview">
                                        <img src="{{ asset('storage/'. $bike->fea_image) }}" alt="plus-circle" width="100px"  height="100px">
                                    </div>
                                @else
                                    <div id="imagePreview" style="background-image: url({{ asset('images/profile-img.svg') }});">
                                    </div>
                                @endif
                            </div>
                            
                            <div class="col-md-6 mb-3" style="margin-top: 1rem !important">
                                <div class="col-md-6 mb-3">
                                    <h6 class="card-subtitle">Title</h6>
                                    <h2 class=" card-text">{{ $bike->title }}</h>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Vendor</h6>
                                <p class=" card-text">{{ $bike->seller->name }}</p>
                            </div>
    
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Brand</h6>
                                <p class=" card-text">{{ $bike->bike_brand->name }}</p>
                            </div>
    
                            @if($bike->mileage != null)
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Mileage</h6>
                                <p class=" card-text">{{ $bike->mileage }}</p>
                            </div>
                            @endif
    
                            @if($bike->cc != null)
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">CC</h6>
                                <p class=" card-text">{{ $bike->cc }}</p>
                            </div>
                            @endif
    
                            @if($bike->bike_type != null)
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Purpose</h6>
                                <p class=" card-text">{{ $bike->bike_type->name }}</p>
                            </div>
                            @endif
    
                            @if($bike->hp != null)
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Hp</h6>
                                <p class=" card-text">{{ $bike->hp }}</p>
                            </div>
                            @endif
    
                            @if($bike->bike_country != null)
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Country</h6>
                                <p class=" card-text">{{ $bike->bike_country->name }}</p>
                            </div>
                            @endif
    
                            @if($bike->bike_state != null)
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">State</h6>
                                <p class=" card-text">{{ $bike->bike_state->name }}</p>
                            </div>
                            @endif
    
                            @if($bike->bike_city != null)
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">City</h6>
                                <p class=" card-text">{{ $bike->bike_city->name }}</p>
                            </div>
                            @endif
    
                            @if($bike->zipCode != null)
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Zip Code</h6>
                                <p class=" card-text">{{ $bike->zipCode }}</p>
                            </div>
                            @endif
    
                            @if($bike->rentPerDay != null)
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Rent Per Day</h6>
                                <p class=" card-text">{{ $bike->rentPerDay }}</p>
                            </div>
                            @endif
    
                            @if($bike->description != null)
                            <div class="col-md-10">
                                <h6 class="card-subtitle">Description</h6>
                                <p class=" card-text">{!! $bike->description !!}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                  </div>
           </div>
        {{-- </section> --}}

    @endsection

@section('bottom_script')
@endsection
