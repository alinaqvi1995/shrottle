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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Name</h6>
                                <p class=" card-text">{{ $leads->name }}</p>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Phone</h6>
                                <p class=" card-text">{{ $leads->country_code }} {{ $leads->phone }}</p>
                            </div>
    
                            @if($leads->email != null)
                            <div class="col-md-6 mb-3">
                                <h6 class="card-subtitle">Email</h6>
                                <p class=" card-text">{{ $leads->email }}</p>
                            </div>
                            @endif
    
                            @if($leads->message != null)
                            <div class="col-md-10">
                                <h6 class="card-subtitle">Message</h6>
                                <p class=" card-text">{!! $leads->message !!}</p>
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
