@extends('dashboard.buyer.layout.app') @section('page_title', 'Shrottle - Rent A Bike') @section('head_style')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> @endsection @section('content')



{{-- <div class="col-xl-4 col-md-6 d-flex mb-5">
    <div class="card dashboard-card bg-one">
        <div class="card-body d-flex align-items-center">
            <div class="first text-center align-self-center">
                <i class="material-icons visibility-icon">visibility</i>
            </div>
            <div class="second">
                <h5 class="card-title">200</h5>
                <p class="card-text">Applicants</p>
            </div>
        </div>
    </div>
</div> --}}
<div class="col-xl-4 col-md-6 mb-5">
    <div class="card dashboard-card bg-one">
        <div class="card-body d-flex align-items-center">
            <div class="first text-center align-self-center">
                <i class="fa-solid fa-plane-departure"></i>
            </div>
            <div class="second">
                <h5 class="card-title">05</h5>
                <p class="card-text">My Trips</p>
            </div>
        </div>
    </div>
</div>
{{-- <div class="col-xl-4 col-md-6 d-flex mb-5">
    <div class="card dashboard-card bg-two">
        <div class="card-body d-flex align-items-center">
            <div class="first text-center align-self-center">
                <i class="material-icons">editroad</i>
            </div>
            <div class="second">
                <h5 class="card-title">05</h5>
                <p class="card-text">My Details</p>
            </div>
        </div>
    </div>
</div> --}}
{{-- <div class="col-xl-4 col-md-6 d-flex mb-5">
    <div class="card dashboard-card bg-three">
        <div class="card-body d-flex align-items-center">
            <div class="first text-center align-self-center">
                <i class="material-icons">editroad</i>
            </div>
            <div class="second">
                <h5 class="card-title">05</h5>
                <p class="card-text">My Details</p>
            </div>
        </div>
    </div>
</div> --}}
{{-- <div class="col-xl-4 col-md-6 d-flex mb-5">
    <div class="card dashboard-card bg-three">
        <div class="card-body d-flex align-items-center">
            <div class="first text-center align-self-center">
                <i class="material-icons">star</i>
            </div>
            <div class="second">
                <h5 class="card-title">10</h5>
                <p class="card-text">Posted Jobs</p>
            </div>
        </div>
    </div>
</div> --}}
<div class="mb-5 col-md-12">
    <div class="table-responsive">
        <div class="table-header-panel">
            <div class="d-flex">
                <div class="first">
                    {{-- <h3 class="text-uppercase title-1 mb-2">wayzerr</h3> --}}
                    <h2 class="text-uppercase title-2">My Recent Bookings</h2>
                </div>
                <div class="align-self-center text-right second">
                    <a href="{{ route('buyer.trips') }}" class="btn_dashboard py-3"> View All</a>
                </div>
            </div>
        </div>
        <table class="table border">
            <thead>
                <tr>
                    <th></th>
                    <th>Bike</th>
                    <th>PickUp</th>
                    <th>DropOff</th>
                    <th>Cost</th>
                    <th>Vendor</th>
                </tr>
            </thead>
            <tbody>
                @if (count($leads) > 0)
                    @foreach ($leads as $key => $row)
                    <tr>
                        <td>{{ ++$key }}. </td>
                        <td>
                            <p>{{ $row->bike->title }}</p>
                            <p class="color-primary">{{ $row->bike->bike_brand->name }}</p>
                        </td>
                        <td>{{ $row->pickup_date}}</td>
                        <td>{{ $row->dropoff_date}}</td>
                        <td>@if($row->totalRent != null) {{ '$'.$row->totalRent }} @endif</td>
                        <td>{{ $row->bike->seller->name }}</td>
                    </tr>
                    
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" align="center">No data available</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>



@endsection @section('bottom_script') @endsection