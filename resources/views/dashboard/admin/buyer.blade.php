@extends('dashboard.admin.layout.app')

@section('page_title', 'E-Rec')

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
                                    <h1 class="text-uppercase title-2">Buyers</h1>
                                </div>
                                {{-- <div class="align-self-center text-right second">
                                    <a href="" class="btn btn-primary" style="color:#FFF;"> View All</a>
                                </div> --}}
                            </div>
                        </div>
                        <table style="width: 100%;">
                            <tr>
                                <th>Sr. #</th>
                                <th>User Name</th>
                                <th>Phone</th>
                                <th>Avatar</th>
                                <th>Action</th>
                            </tr>
                            {{-- <tr>
                                <td>Sr. #</td>
                                <td>User Name</td>
                                <td>Email</td>
                                <td>Description</td>
                                <td>Avatar</td>
                                <td>Action</td>
                            </tr> --}}
                            @if (count($buyer) > 0)
                            @foreach ($buyer as $key=>$row)
                            <tr>
                                <td>{{ ++$key }}. </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->country_code }} {{ $row->phone }}</td>
                                <td>
                                    @if($row->avatar != null)
                                    <img src="{{ asset('storage/'. $row->avatar) }}" alt="plus-circle" width="70px" style="border-radius: 100px" height="70px">
                                    @else
                                    No Image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.buyer.details', $row->id) }}" class="btn btn-primary btn-sm mt-2"><i
                                        class="fa fa-info" style="font-size:18px"></i></a>
                                    <a href="" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger btn-sm mt-2"><i
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
                                <th>Phone</th>
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
