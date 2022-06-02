@extends('dashboard.seller.layout.app')

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
        <form method="post" action="{{ route('seller.gallery.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gallery" class="form-label fs-14 text-theme-primary fw-bold">Gallery Images</label>
                    <input type="file" class="form-control fs-14 h-50px" name="gallery[]" multiple>
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
