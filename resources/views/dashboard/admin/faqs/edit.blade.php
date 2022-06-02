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
        <form method="post" action="{{ route('admin.faqs.update') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <input type="hidden" name="faq_id" value="{{ $faqs->id }}">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="question" class="form-label fs-14 text-theme-primary fw-bold">Question</label>
                    <input type="text" class="form-control fs-14 h-50px" name="question" value="{{ $faqs->question }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="answer" class="form-label fs-14 text-theme-primary fw-bold">Answer</label>
                    <input type="text" class="form-control fs-14 h-50px" name="answer" value="{{ $faqs->answer }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Status</label>
                    <select name="status" id="role" class="form-control fs-14  h-50px" required>
                        <option @if($faqs->status == 1) selected @endif value="1">Active</option>
                        <option @if($faqs->status == 0) selected @endif value="0">Inactive</option>
                    </select>
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
