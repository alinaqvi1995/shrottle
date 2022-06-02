@extends('dashboard.admin.layout.app')

@section('page_title', 'Cobra Rider')

@section('head_style')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

    @section('content')

        <section>
           <div class="container">
                <div class="card">
                    <div class="table table-border table-responsive">
                        <div class="table-header-panel">
                            <div class="d-flex">
                                <div class="first">
                                    {{-- <h3 class="text-uppercase title-1 mb-2">wayzerr</h3> --}}
                                    <h1 class="text-uppercase title-2">Bikes</h1>
                                </div>
                                {{-- <div class="align-self-center text-right second">
                                    <a href="" class="btn btn-primary" style="color:#FFF;"> View All</a>
                                </div> --}}
                            </div>
                        </div>
                        <table style="width: 100%;">
                            <tr>
                                <th>Sr. #</th>
                                <th>Brand Name</th>
                                <th>CC</th>
                                <th>Seller</th>
                                <th>Featured Image</th>
                                <th>Action</th>
                            </tr>
                            @if (count($bike) > 0)
                            @foreach ($bike as $key=>$row)
                            <tr>
                                <td>{{ ++$key }}. </td>
                                <td>{{ $row->bike_brand->name }}</td>
                                <td>{{ $row->cc }}</td>
                                <td>{{ $row->seller->name }}</td>
                                <td>
                                    @if($row->fea_image != null)
                                    <img src="{{ asset('storage/'. $row->fea_image) }}" alt="plus-circle" width="70px" style="border-radius: 100px" height="70px">
                                    @else
                                    No Image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.bike.details', $row->slug) }}" class="btn btn-primary btn-sm mt-2"><i
                                        class="fa fa-info" style="font-size:18px"></i></a>
                                    <a href="{{ route('admin.bike.delete', $row->id) }}" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger btn-sm mt-2"><i
                                        class="fa fa-trash" style="font-size:18px"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                              <td colspan="6" allign="center">No data available</td>
                            </tr>
                            @endif
                            <tr>
                                <th>Sr. #</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Description</th>
                                <th>Avatar</th>
                                <th>Action</th>
                            </tr>
                        </table>
                    </div>
                </div>
           </div>
        </section>

    @endsection

@section('bottom_script')
@endsection
