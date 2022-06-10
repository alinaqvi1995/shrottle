@extends('dashboard.seller.layout.app') @section('page_title', 'Shrottle - Rent A Bike') @section('head_style')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> @endsection
@section('content')

<div class="container">
    <div class="row mb-4">
        <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="text-uppercase title-2">My Gallery</h2>
        </div>
        <div class="align-self-center text-right col-md-6">
            <a class="btn_dashboard py-3" href="{{ route('seller.gallery.create') }}"> Add Pictures</a>
        </div>
    </div>

    <div class="row">
        @foreach ($gallery as $pic)
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <img src="{{ asset('storage/vendorGallery/images/' . $pic->image) }}"
                    style="height: 250px; width: 300px;" class="img-fluid fit-none" alt="">
            </div>
        @endforeach
        @if ($load_more == null)
            @if (count($galleryAll) > 8)
                <div class="col-12 text-center">
                    <form action="{{ route('seller.gallery') }}" method="get">
                        <input type="hidden" name="load_more" value="?">
                        <button type="submit" class="btn_dashboard py-3">Load More</button>
                    </form>
                </div>
            @endif
        @endif
    </div>
</div>

@endsection @section('bottom_script') @endsection
