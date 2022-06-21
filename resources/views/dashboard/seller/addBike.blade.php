@extends('dashboard.seller.layout.app')

@section('page_title', 'Shrottle - Rent A Bike')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

@endsection

@section('content')
    <style>
        .upload {
            &__box {
                padding: 40px;
            }

            &__inputfile {
                width: .1px;
                height: .1px;
                opacity: 0;
                overflow: hidden;
                position: absolute;
                z-index: -1;
            }

            &__btn {
                display: inline-block;
                font-weight: 600;
                color: #fff;
                text-align: center;
                min-width: 116px;
                padding: 5px;
                transition: all .3s ease;
                cursor: pointer;
                border: 2px solid;
                background-color: #4045ba;
                border-color: #4045ba;
                border-radius: 10px;
                line-height: 26px;
                font-size: 14px;

                &:hover {
                    background-color: unset;
                    color: #4045ba;
                    transition: all .3s ease;
                }

                &-box {
                    margin-bottom: 10px;
                }
            }

            &__img {
                &-wrap {
                    display: flex;
                    flex-wrap: wrap;
                    margin: 0 -10px;
                }

                &-box {
                    width: 200px;
                    padding: 0 10px;
                    margin-bottom: 12px;
                }

                &-close {
                    width: 24px;
                    height: 24px;
                    border-radius: 50%;
                    background-color: rgba(0, 0, 0, 0.5);
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    text-align: center;
                    line-height: 24px;
                    z-index: 1;
                    cursor: pointer;

                    &:after {
                        content: '\2716';
                        font-size: 14px;
                        color: white;
                    }
                }
            }
        }

        .imgbox{
        }
        
        .img-bg {
            /* width: 100px; */
            /* height: 100px; */
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }
    </style>
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
            <div class="col-md-6">
                <div class="form-group">
                    <label for="rentPerDay" class="form-label fs-14 text-theme-primary fw-bold">Rent Per Day</label>
                    <input type="number" class="form-control fs-14 input-dashboard" name="rentPerDay">
                </div>
            </div>
            {{-- <div class="col-md-6">
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
                <div class="upload__box">
                    <div class="upload__btn-box">
                        <label class="upload__btn">
                            <p>Upload images</p>
                            <input name="gallery[]" type="file" multiple="" data-max_length="20" class="upload__inputfile">
                        </label>
                        <div class="upload__img-wrap"></div>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="gallery" class="form-label fs-14 text-theme-primary fw-bold">Gallery Images</label>
                    <input type="file" class="form-control upload__inputfile fs-14 input-dashboard" name="gallery[]" multiple>
                </div> --}}
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

        jQuery(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var html =
                                        "<div class='upload__img-box'><div style='background-image: url(" +
                                        e.target.result + ")' data-number='" + $(
                                            ".upload__img-close").length + "' data-file='" + f
                                        .name +
                                        "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
    </script>
@endsection

@section('bottom_script')
@endsection
