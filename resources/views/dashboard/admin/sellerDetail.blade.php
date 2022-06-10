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
                                @if($seller->avatar != NULL)
                                    <div id="imagePreview">
                                        <img src="{{ asset('storage/'. $seller->avatar) }}" alt="plus-circle" width="100px"  height="100px">
                                    </div>
                                @else
                                    <div id="imagePreview" style="background-image: url({{ asset('images/profile-img.svg') }});">
                                    </div>
                                @endif
                            </div>
                            
                            <div class="col-md-6 mb-3" style="margin-top: 1rem !important">
                                <div class="col-md-6 mb-3">
                                    <h6 class="card-subtitle">Name</h6>
                                    <h2 class=" card-text">{{ $seller->name }}</h>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Phone</h6>
                                <p class=" card-text">{{ $seller->country_code }} {{ $seller->phone }}</p>
                            </div>
    
                            @if($seller->address != null)
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Address</h6>
                                <p class=" card-text">{{ $seller->address }}</p>
                            </div>
                            @endif
    
                            @if($seller->company_name != null)
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Company</h6>
                                <p class=" card-text">{{ $seller->company_name }}</p>
                            </div>
                            @endif
    
                            @if($seller->company_logo != null)
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Company Logo</h6>
                                <img src="{{ asset('storage/' . $seller->company_logo) }}" alt="plus-circle" width="70px" style="border-radius: 100px" height="70px">
                            </div>
                            @endif
    
                            @if($seller->description != null)
                            <div class="col-md-10">
                                <h6 class="card-subtitle">Description</h6>
                                <p class=" card-text">{!! $seller->description !!}</p>
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
