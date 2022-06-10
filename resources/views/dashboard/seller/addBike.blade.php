@extends('dashboard.seller.layout.app')

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
        <form method="post" class="row" action="{{ route('seller.bikes.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title" class="form-label fs-14 text-theme-primary fw-bold">Title</label>
                    <input type="text" class="form-control fs-14 input-dashboard" name="title" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Brand</label>
                    <select name="brand" id="role" class="form-control fs-14 input-dashboard" required>
                        <option selected disabled>Select Brand</option>
                        @foreach ($brand as $con)
                            <option value="{{ $con->id }}">
                                {{ $con->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mileage_bike" class="form-label fs-14 text-theme-primary fw-bold">Mileage</label>
                    <input type="text" class="form-control fs-14 input-dashboard" name="mileage_bike" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mileage" class="form-label fs-14 text-theme-primary fw-bold">Model</label>
                    <input type="text" class="form-control fs-14 input-dashboard" name="mileage">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cc" class="form-label fs-14 text-theme-primary fw-bold">CC</label>
                    <input type="text" class="form-control fs-14 input-dashboard" name="cc" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="hp" class="form-label fs-14 text-theme-primary fw-bold">HP</label>
                    <input type="text" class="form-control fs-14 input-dashboard" name="hp">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type" class="form-label fs-14 text-theme-primary fw-bold">Purpose</label>
                    <select name="type" class="form-control input-dashboard" id="">
                        <option value="">Select Type</option>
                        @foreach ($type as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="reg_no" class="form-label fs-14 text-theme-primary fw-bold">Registration #.</label>
                    <input type="text" class="form-control fs-14 input-dashboard" name="reg_no">
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="form-group">
                    <label for="weight" class="form-label fs-14 text-theme-primary fw-bold">Weight</label>
                    <input type="text" class="form-control fs-14 input-dashboard" name="weight">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="seat_height" class="form-label fs-14 text-theme-primary fw-bold">Seat Height</label>
                    <input type="text" class="form-control fs-14 input-dashboard" name="seat_height">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lugaggeR" class="form-label fs-14 text-theme-primary fw-bold">Lugagge</label>
                    <input type="text" placeholder="Right Case" class="form-control fs-14 input-dashboard" name="lugaggeR">
                    <input type="text" placeholder="Left Case" class="form-control fs-14 input-dashboard" name="lugaggeL">
                    <input type="text" placeholder="Top Case" class="form-control fs-14 input-dashboard" name="lugaggeT">
                </div>
            </div> --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description" class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                    <textarea maxlength="400" class="form-control fs-14 h-50px summernote" name="description"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pickup_loc" class="form-label fs-14 text-theme-primary fw-bold">Pickup Location</label>
                    <input type="text" class="form-control fs-14 input-dashboard" name="pickup_loc" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Country</label>
                    <select name="country" class="form-control input-dashboard" id="country-dropdown" required>
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">
                                {{ $country->name }}
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
                    <select class="form-control input-dashboard" name="state" id="state-dropdown">
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">City</label>
                    <select name="city" class="form-control input-dashboard" id="city-dropdown">
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="zipCode" class="form-label fs-14 text-theme-primary fw-bold">Zip Code</label>
                    <input type="text" class="form-control fs-14 input-dashboard" name="zipCode" required>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="form-group">
                    <label for="availablity" class="form-label fs-14 text-theme-primary fw-bold">Availablity</label>
                    <input type="text" class="form-control fs-14 input-dashboard" name="availablity">
                </div>
            </div> --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fea_image" class="form-label fs-14 text-theme-primary fw-bold">Featured Image</label>
                    <input type="file" class="form-control fs-14 input-dashboard" name="fea_image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gallery" class="form-label fs-14 text-theme-primary fw-bold">Gallery Images</label>
                    <input type="file" class="form-control fs-14 input-dashboard" name="gallery[]" multiple>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="regNoImage" class="form-label fs-14 text-theme-primary fw-bold">Registration Paper
                        Image</label>
                    <input type="file" class="form-control fs-14 input-dashboard" name="regNoImage">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <button type="submit" class="btn_dashboard"> Add </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#country-dropdown').on('change', function() {
                var country_id = this.value;
                console.log(country_id);
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{ url('seller/get-states-by-country') }}" + "/" + country_id,
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
                console.log(state_id);
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{ route('cityGet', '') }}" + "/" + state_id,
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

@section('bottom_script')
@endsection
