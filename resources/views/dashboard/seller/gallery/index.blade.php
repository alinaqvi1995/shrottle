@extends('dashboard.seller.layout.app') @section('page_title', 'Cobra Rider') @section('head_style')
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
                <a href="https://images.pexels.com/photos/38238/maldives-ile-beach-sun-38238.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" data-fancybox="gallery" >
                    <img src="https://images.pexels.com/photos/38238/maldives-ile-beach-sun-38238.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="img-fluid img_galleyr">
                </a>
            </div>
        @endforeach
       
       @if(count($gallery)>0)
        <div class="col-12 text-center">
            <a href="" class="btn_dashboard py-3">
                Load More
            </a>
        </div>
        @endif
        

        

        



    </div>




</div>


<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        $(".fancybox").fancybox({-->
<!--            openEffect: "none",-->
<!--            closeEffect: "none"-->
<!--        });-->

<!--        $(".zoom").hover(function() {-->

<!--            $(this).addClass('transition');-->
<!--        }, function() {-->

<!--            $(this).removeClass('transition');-->
<!--        });-->
<!--    });-->
<!--</script>-->

@endsection @section('bottom_script') @endsection
