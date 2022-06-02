<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shrottle -  Admin Panel</title>
    <link rel="icon" href="{{ asset('/images/cobraLogo01.png') }}"> 
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{asset('dashboard/css/font_awesome.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/css/google_api.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dashboard/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ asset('dashboard/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/extra_style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"/>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <style>
      .navbar {
        justify-content: flex-end;
        background-color: #ffffff;
        border-bottom: 1px solid #ebebeb;
      }
      .navbar .navbar-nav .nav-link,
      .navbar .navbar-nav .nav-link img {
        height: 100%
      }
      /* .main-content {
        margin-top: 99px;
         border-top: 1px solid #dee2e6;
         border-right: 1px solid #dee2e6;
      } */
      .main-content-container
      {
          background-color:#ffffff;
      }
      
      .bg-success {
          background-color: #28a745 !important;
      }
      .bg-danger, .btn-danger {
          background-color: #dc3545 !important;
      }
    </style>
  </head>
  <body class="h-100">
    {{-- <div class="color-switcher animated">

        @include('dashboard.includes.colorthemechange')
    </div>
    <div class="color-switcher-toggle animated pulse infinite">
      <i class="material-icons">settings</i>
    </div> --}}
    <!-- Header  Section -->

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar  Section -->
            @include('dashboard.admin.includes.sidebar')


            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <div class="main-navbar sticky-top bg-white">
                    @include('dashboard.admin.includes.header')

          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <!-- <span class="text-uppercase page-subtitle">Dashboard</span>
                <h3 class="page-title">Blog Overview</h3> -->
              </div>
            </div>
            <!-- End Page Header -->

            <div class="row admin-panel-css">

                <!-- Content Section. Contains page content -->
                @yield('content')

            </div>
          </div>


           <!-- Main Footer -->
            @include('dashboard.admin.includes.footer')
        </main>
      </div>
    </div>
    {{-- <div class="promo-popup animated">
      <a href="http://bit.ly/shards-dashboard-pro" class="pp-cta extra-action">
        <img src="https://dgc2qnsehk7ta.cloudfront.net/uploads/sd-blog-promo-2.jpg"> </a>
      <div class="pp-intro-bar"> Need More Templates?
        <span class="close">
          <i class="material-icons">close</i>
        </span>
        <span class="up">
          <i class="material-icons">keyboard_arrow_up</i>
        </span>
      </div>
      <div class="pp-inner-content">
        <h2>Shards Dashboard Pro</h2>
        <p>A premium & modern Bootstrap 4 admin dashboard template pack.</p>
        <a class="pp-cta extra-action" href="http://bit.ly/shards-dashboard-pro">Download</a>
      </div>
    </div> --}}
    <script src="{{asset('dashboard/js/jquery_3.3.1.min.js')}}"  crossorigin="anonymous"></script>
    <script src="{{asset('dashboard/js/popper.min.js')}}"  crossorigin="anonymous"></script>
    <script src="{{asset('dashboard/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>

    <!-- Comment because graphs are not important -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
        <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>

    <!-- comment end -->

    <script src="{{ asset('dashboard/js/extra_js.js')}}"></script>
    <script src="{{ asset('dashboard/js/app.js')}}"></script>
    <script src="{{ asset('dashboard/js/blog_js.js')}}"></script>

    @yield('bottom_script')
  </body>
</html>
