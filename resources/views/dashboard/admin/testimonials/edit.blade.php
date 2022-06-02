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
        <form method="post" action="{{ route('admin.test.update') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <input type="hidden" name="test_id" value="{{ $cust->id }}">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Rating</label>
                    <select name="status" id="role" class="form-control fs-14  h-50px" required>
                        <option value="0" selected>0</option>
                        <option @if($cust->status == 1) selected @endif value="1">1</option>
                        <option @if($cust->status == 2) selected @endif value="2">2</option>
                        <option @if($cust->status == 3) selected @endif value="3">3</option>
                        <option @if($cust->status == 4) selected @endif value="4">4</option>
                        <option @if($cust->status == 5) selected @endif value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description" class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                    <textarea class="form-control fs-14 h-50px summernote" name="description">{{ $cust->description }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Name</label>
                    <input type="text" class="form-control fs-14 h-50px" name="name" value="{{ $cust->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title" class="form-label fs-14 text-theme-primary fw-bold">Title</label>
                    <input type="text" class="form-control fs-14 h-50px" name="title" value="{{ $cust->title }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Status</label>
                    <select name="status" id="role" class="form-control fs-14  h-50px" required>
                        <option @if($cust->status == 1) selected @endif value="1">Active</option>
                        <option @if($cust->status == 0) selected @endif value="0">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image" class="form-label fs-14 text-theme-primary fw-bold">Image</label>
                    <input type="file" class="form-control fs-14 h-50px" name="avatar">
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
