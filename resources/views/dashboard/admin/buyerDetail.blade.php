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
                                @if($buyer->avatar != NULL)
                                    <div id="imagePreview">
                                        <img src="{{ asset('storage/'. $buyer->avatar) }}" alt="plus-circle" width="100px"  height="100px">
                                    </div>
                                @else
                                    <div id="imagePreview" style="background-image: url({{ asset('images/profile-img.svg') }});">
                                    </div>
                                @endif
                            </div>
                            
                            <div class="col-md-6 mb-3" style="margin-top: 1rem !important">
                                <div class="col-md-6 mb-3">
                                    <h6 class="card-subtitle">Name</h6>
                                    <h2 class=" card-text">{{ $buyer->name }}</h>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Phone</h6>
                                <p class=" card-text">{{ $buyer->country_code }} {{ $buyer->phone }}</p>
                            </div>
    
                            @if($buyer->license_no != null)
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">License</h6>
                                <p class=" card-text">{{ $buyer->license_no }}</p>
                            </div>
                            @endif
    
                            @if($buyer->description != null)
                            <div class="col-md-10">
                                <h6 class="card-subtitle">Description</h6>
                                <p class=" card-text">{!! $buyer->description !!}</p>
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
