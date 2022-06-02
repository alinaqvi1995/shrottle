@extends('dashboard.admin.layout.app')

@section('page_title', 'Cobra Rider')

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
        <form method="post" action="{{ route('admin.brand.update') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <input type="hidden" name="brand_id" value="{{ $brand->id }}">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Name</label>
                    <input type="text" class="form-control fs-14 h-50px" name="name" value="{{ $brand->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="shortname" class="form-label fs-14 text-theme-primary fw-bold">Short Name</label>
                    <input type="text" class="form-control fs-14 h-50px" name="shortname" value="{{ $brand->shortname }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Active</label>
                    <select name="active" id="" class="form-control fs-14  h-50px" required>
                        <option value="1" @if($brand->active == 1) selected @endif>Yes</option>
                        <option value="0" @if($brand->active == 0) selected @endif>No</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Featured</label>
                    <select name="featured" id="" class="form-control fs-14  h-50px" required>
                        <option value="1" @if($brand->featured == 1) selected @endif>Yes</option>
                        <option value="0" @if($brand->featured == 0) selected @endif>No</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image" class="form-label fs-14 text-theme-primary fw-bold">Image</label>
                    <input type="file" class="form-control fs-14 h-50px" name="image">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" class="w-25 btn btn-primary"> Update </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('bottom_script')
@endsection
