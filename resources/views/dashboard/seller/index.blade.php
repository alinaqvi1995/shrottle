@extends('dashboard.seller.layout.app') @section('page_title', 'Shrottle - Rent A Bike') @section('head_style')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> @endsection @section('content')
<style>
    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin: 0;
        padding: 0;
    }
    
    .table-header-panel .title-1 {
        font-size: 16px;
        line-height: 1;
        color: #999;
    }
    
    .table-header-panel .title-2 {
        font-size: 48px;
        color: #333;
    }
    
    .view-all-table {
        border-radius: 4px;
        background: #007ba7;
        color: #ffffff;
        padding: 10px 30px;
        margin-right: 10px;
        border: 1px solid transparent;
        cursor: pointer;
    }
    
    .table-header-panel .d-flex .first {
        flex: 0 0 auto;
        width: 75%;
    }
    
    .table-header-panel .d-flex .second {
        flex: 0 0 auto;
        width: 25%;
        margin-top: 26px;
    }
    
    .table-header-panel {
        border: 1px solid #dee2e6;
        padding: 24px;
        border-bottom: 0;
    }
    
    .table.border {
        border: 1px solid #dee2e6;
    }
    
    .color-primary {
        color: #3c7ba7;
    }
    
    .dashboard-card .card-title {
        font-weight: 500;
        margin-bottom: 0.75rem;
        font-size: 46px;
        color: #fff;
    }
    
    .card.dashboard-card.bg-one {
        background-color: #3c7ba7;
    }
    
    .card.dashboard-card.bg-two {
        background-color: #5fc2ba;
    }
    
    .card.dashboard-card.bg-three {
        background-color: #333;
    }
    
    .card.dashboard-card .card-text {
        font-size: 36px;
        line-height: 1.4;
        margin-bottom: 0;
        color: #fff;
    }
    
    .dashboard-card i {
        font-size: 80px;
        color: #fff;
    }
    
    .dashboard-card .d-flex .first {
        flex: 0 0 auto;
        width: 30%;
    }
    
    .dashboard-card .d-flex .second {
        flex: 0 0 auto;
        width: 70%;
    }
</style>

{{-- <div class="col-xl-4 col-md-6 d-flex mb-5">
    <div class="card dashboard-card bg-one">
        <div class="card-body d-flex align-items-center">
            <div class="first text-center align-self-center">
                <i class="material-icons">editroad</i>
            </div>
            <div class="second">
                <h5 class="card-title">05</h5>
                <p class="card-text">My Bikes</p>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-md-6 d-flex mb-5">
    <div class="card dashboard-card bg-two">
        <div class="card-body d-flex align-items-center">
            <div class="first text-center align-self-center">
                <i class="material-icons">editroad</i>
            </div>
            <div class="second">
                <h5 class="card-title">05</h5>
                <p class="card-text">My Rentals</p>
            </div>
        </div>
    </div>
</div> --}}
<div class="mb-5 col-md-12">
    <div class="table-responsive">
        <div class="table-header-panel">
            <div class="d-flex">
                <div class="first">
                    <h2 class="text-uppercase title-2">recent bookings</h2>
                </div>
                <div class="align-self-center text-right second">
                    <a href="{{ route('seller.booking') }}" class="btn_dashboard py-3"> View All</a>
                </div>
            </div>
        </div>
        <table class="table border">
            <thead>
                <tr>
                    <th></th>
                    <th>User</th>
                    <th>Bike</th>
                    <!--<th>Location</th>-->
                    <th>Start/End Date</th>
                </tr>
            </thead>
            <tbody>
                @if (count($leads) > 0)
                    @foreach ($leads as $key => $row)
                    <tr>
                        <td>{{ ++$key }}. </td>
                        <td>{{ $row->user->buyer->name }}</td>
                        <td>
                            <p>{{ $row->bike->title }}</p>
                            <p class="color-primary">{{ $row->bike->bike_brand->name }}</p>
                        </td>
                        <td>{{ $row->pickup_date}} - {{ $row->dropoff_date }}</td>
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