@extends('dashboard.seller.layout.app')

@section('page_title', 'E-Rec')

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
        @if (session('error'))
            <!-- <div class="account-title">{{ session('error') }}</div> -->
            <div class="account-title">

                <p class="alert alert-danger">{{ session('error') }}</p>

            </div>
        @endif

        <form method="post" class="row" action="{{ route('seller.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">User Name</label>
                    <input type="text" class="form-control fs-14 h-50px input-dashboard" name="name" value="{{ $name }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fs-14 text-theme-primary fw-bold">Phone Number </label>
                <div class="row">
                    <div class="col-3 pr-0">
                        <input type="tel" class="form-control fs-14 h-50px w-60 mobile-number" id="country_code" maxlength="3"
                            value="{{ $country_code }}" name="country_code">
                    </div>
                    <div class="col-6 pl-0">
                        <input type="number" class="form-control fs-14 h-50px input-dashboard" name="phone" value="{{ $phone }}" placeholder="Eg:  876xxxxxxx">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address" class="form-label fs-14 text-theme-primary fw-bold">Address</label>
                    <input type="text" class="form-control fs-14 h-50px input-dashboard" name="address" value="{{ $address }}"
                        required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Country</label>
                    <select name="country" class="form-control input-dashboard " id="country-dropdown">
                        <option value="">Select Country</option>
                        @foreach ($countries as $row)
                            <option @if($row->id == $country) selected @endif value="{{ $row->id }}">
                                {{ $row->name }}
                            </option>
                        @endforeach
                    </select>
                    {{-- <select name="country" id="role" class="form-control fs-14  h-50px" required>
                        <option selected disabled>Select Country</option>
                        @foreach ($country_all as $con)
                            <option @if ($con->id == $country) selected @endif value="{{ $con->id }}">
                                {{ $con->name }}</option>
                        @endforeach
                    </select> --}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">State</label>
                    <select class="form-control input-dashboard " name="state" id="state-dropdown" required>
                        @if ($state != null)
                            @foreach ($state_all as $st)
                                <option value="{{ $st->id }}" @if($st->id == $state) selected @endif>{{ $st->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    {{-- <select name="state" id="role" class="form-control fs-14  h-50px" required>
                        <option selected disabled>Select State</option>
                        @foreach ($state_all as $con)
                            <option @if ($con->id == $state) selected @endif value="{{ $con->id }}">
                                {{ $con->name }}</option>
                        @endforeach
                    </select> --}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">City</label>
                    <select name="city" class="form-control input-dashboard " id="city-dropdown">
                        @if ($city != null)
                            @foreach ($city_all as $st)
                                <option value="{{ $st->id }}" @if($st->id == $city) selected @endif>{{ $st->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    {{-- <select name="city" id="role" class="form-control fs-14  h-50px" required>
                        <option selected disabled>Select City</option>
                        @foreach ($city_all as $con)
                            <option @if ($con->id == $city) selected @endif value="{{ $con->id }}">
                                {{ $con->name }}</option>
                        @endforeach
                    </select> --}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="zip_code" class="form-label fs-14 text-theme-primary fw-bold">Zip Code</label>
                    <input type="text" class="form-control fs-14 h-50px input-dashboard" name="zip_code" value="{{ $zip_code }}"
                        required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="avatar" class="form-label fs-14 text-theme-primary fw-bold">Profile Image</label>
                    <input type="file" class="form-control fs-14 h-50px input-dashboard" name="avatar" value="{{ $avatar }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_name" class="form-label fs-14 text-theme-primary fw-bold">Company Name</label>
                    <input type="text" class="form-control fs-14 h-50px input-dashboard" name="company_name" value="{{ $company_name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_logo" class="form-label fs-14 text-theme-primary fw-bold">Company Logo</label>
                    <input type="file" class="form-control fs-14 h-50px input-dashboard" name="company_logo" value="{{ $company_logo }}">
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

    <script>
        $(document).ready(function() {
            $('#country-dropdown').on('change', function() {
                var country_id = this.value;
                // console.log(country_id);
                $("#state-dropdown").html('');
                $.ajax({
                    url: "get-states-by-country/" + country_id,
                    type: "get",
                    dataType: 'json',
                    success: function(result) {
                        console.log(result);
                        $.each(result.states, function(key, value) {
                            $("#state-dropdown").append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                        $('#city-dropdown').html(
                            '<option value="">Select State First</option>');
                    }
                });
            });
            $('#state-dropdown').on('change', function() {
                var state_id = this.value;
                // console.log(state_id);
                $("#city-dropdown").html('');
                $.ajax({
                    url: "get-cities-by-state/" + state_id,
                    type: "get",
                    data: {
                        state_id: state_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $.each(result.cities, function(key, value) {
                            $("#city-dropdown").append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
