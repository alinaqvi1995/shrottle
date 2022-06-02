@extends('dashboard.buyer.layout.app')

@section('page_title', 'Cobra Rider')

@section('head_style')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

    @section('content')
    <div class="container">
        {{-- <div class="heading">

            @if($buyer != NULL)
            <img id="imagePreview" src="{{ asset('storage/'.$buyer->avatar) }}" width="100px" height="100px"/>

            @else
            <img id="imagePreview" src="{{ asset('dashboard/images/avatar/0.jpg') }}">
            </div>
            @endif
            <h3>My Profile</h3>
        </div> --}}
        <form method="post" class="row" action="{{ route('buyer.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Name</label>
                    <input type="text" class="form-control fs-14 input-dashboard" name="name" value="{{ $name }}" required>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Category</label>
                    <select name="category[]" id="role" class="select2-multiple form-control fs-14  h-50px" required multiple>
                    <option disabled>Choose</option>
                    @foreach ($category as $ca)
                        <option value="{{ $ca->id }}"
                            @if($user->company->features != null)
                                @foreach ($user->company->features as $row)
                                    @if($row->id == $ca->id)
                                        Selected
                                    @endif
                                @endforeach
                            @endif>{{ $ca->name }}</option>
                    @endforeach
                  </select>
                </div>
            </div> --}}
            <div class="col-md-6">
                <label for="" class="form-label fs-14 text-theme-primary fw-bold">Phone Number </label>
                <div class="row">
                    <div class="col-3 pr-0">
                        <input type="tel" placeholder="Phone Number (Only Numbers)" class="mobile-number form-control fs-14 input-dashboard" maxlength="3" value="{{ $country_code }}" name="country_code" >
                    </div>
                    <div class="col-6 pl-0">
                        <input type="number" class="form-control fs-14 input-dashboard" name="phone" value="{{ $phone }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="license_no" class="form-label fs-14 text-theme-primary fw-bold">Driver License #.</label>
                    <input type="text" class="form-control fs-14 input-dashboard" name="license_no" value="{{ $license_no }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description" class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                    <textarea class="form-control fs-14 h-50px summernote" name="description">{{ $description }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="avatar" class="form-label fs-14 text-theme-primary fw-bold">Profile Image</label>
                    <input type="file" class="form-control fs-14 input-dashboard" name="avatar" value="{{ $avatar }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="license_image" class="form-label fs-14 text-theme-primary fw-bold">License Image</label>
                    <input type="file" class="form-control fs-14 input-dashboard" name="license_image" value="{{ $license_image }}">
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" class="btn_dashboard"> Update </button>
                </div>
            </div>
        </form>
    </div>
    @endsection

@section('bottom_script')
<script src="https://www.jqueryscript.net/demo/jQuery-International-Telephone-Input-With-Flags-Dial-Codes/build/js/intlTelInput.js"></script>
    <script>
        $(".mobile-number").intlTelInput();
    </script> 
@endsection
