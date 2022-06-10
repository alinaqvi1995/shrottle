@extends('dashboard.admin.layout.app')

@section('page_title', 'Shrottle - Rent A Bike')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')
    <div class="container">
        {{-- <div class="heading">

            @if ($buyer != null)
            <img id="imagePreview" src="{{ asset('storage/'.$buyer->avatar) }}" width="100px" height="100px"/>

            @else
            <img id="imagePreview" src="{{ asset('dashboard/images/avatar/0.jpg') }}">
            </div>
            @endif
            <h3>My Profile</h3>
        </div> --}}
        <form method="post" action="{{ route('admin.type.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Name</label>
                    <input type="text" class="form-control fs-14 h-50px" name="name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Status</label>
                    <select name="status" id="role" class="form-control fs-14  h-50px" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" class="w-25 btn btn-primary"> Add </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('bottom_script')
@endsection
