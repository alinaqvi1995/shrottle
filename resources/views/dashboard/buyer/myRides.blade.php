@extends('dashboard.buyer.layout.app')

@section('page_title', 'Shrottle - Rent A Bike')

@section('head_style')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


@endsection

    @section('content')

        <section>
           <div>
                <div>
                    <div class="table-responsive">
                        <div class="table-header-panel">
                            <div class="d-flex">
                                <div class="first">
                                    {{-- <h3 class="text-uppercase title-1 mb-2">wayzerr</h3> --}}
                                    <h1 class="text-uppercase title-2">My Bookings</h1>
                                </div>
                                {{-- <div class="align-self-center text-right second">
                                    <a href="" class="btn btn-primary" style="color:#FFF;"> View All</a>
                                </div> --}}
                            </div>
                        </div>
                        <table class="table border" style="width: 100%;">
                            <thead>
                            <tr>
                                <th>Sr. #</th>
                                <th>Bike</th>
                                <th>Pickup</th>
                                <th>Dropoff</th>
                                <th>Vendor</th>
                                <!--<th>Featured Image</th>-->
                                <th>Action</th>
                            </tr>
                            <thead/>
                            <tbody>
                            @if (count($leads) > 0)
                            @foreach ($leads as $key=>$row)
                            <tr>
                                <td>{{ ++$key }}. </td>
                                <td>
                                    <p>{{ $row->bike->title }}</p>
                                    <p class="color-primary">{{ $row->bike->bike_brand->name }}</p>
                                </td>
                                <td>{{ $row->pickup_date }}</td>
                                <td>{{ $row->dropoff_date }}</td>
                                <td>{{ $row->bike->seller->name }}</td>
                                {{-- <td>
                                    @if($row->fea_image != null)
                                    <img src="{{ asset('storage/'. $row->fea_image) }}" alt="plus-circle" width="70px" style="border-radius: 100px" height="70px">
                                    @else
                                    No Image
                                    @endif
                                </td> --}}
                                <td>
                                    <a href="{{ route('buyer.trips.details', $row->id) }}" class="btn btn-primary btn-sm mt-2"><i
                                        class="fa fa-info" style="font-size:18px"></i> View</a>
                                    <!--<a href="" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger btn-sm mt-2"><i-->
                                    <!--    class="fa fa-trash" style="font-size:18px"></i></a>-->
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                              <td colspan="6" allign="center">No data available</td>
                            </tr>
                            @endif
                            <tbody/>
                        </table>
                    </div>
                </div>
           </div>
        </section>

    @endsection

@section('bottom_script')
@endsection
