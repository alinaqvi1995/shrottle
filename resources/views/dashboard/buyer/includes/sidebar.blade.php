 <!-- Main Sidebar -->
 <style>


     .admin-panel-round-img .avatar {
         width: 150px;
         height: 150px;
         border-radius: 50%;
     }

 </style>
 <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
     <div class="main-navbar">
         <nav class="navbar align-items-stretch navbar-light flex-md-nowrap border-bottom p-0">
             <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                 <div class="d-table m-auto">
                     <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;"
                         src="{{ asset('dashboard/images/shards-dashboards-logo.svg') }}" alt="Shards Dashboard">
                     <span class="d-none d-md-inline ml-1">Dashboard</span>
                 </div>
             </a>
             <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                 <i class="material-icons">&#xE5C4;</i>
             </a>
         </nav>
     </div>
     <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
         <div class="input-group input-group-seamless ml-3">
             <div class="input-group-prepend">
                 <div class="input-group-text">
                     <i class="fas fa-search"></i>
                 </div>
             </div>
             <input class="navbar-search form-control" type="text" placeholder="Search for something..."
                 aria-label="Search">
         </div>
     </form>
     <div class="nav-wrapper">
         <div class="admin-panel-round-img text-center py-4">
             @if (isset(auth()->user()->buyer->avatar))
                 <img class="avatar shadow" src="{{ asset('storage/' . auth()->user()->buyer->avatar) }}" alt="">
             @else
                 <img class="avatar shadow" src="{{asset('dashboard/images/avatar/avatar.jfif')}}" alt="">
             @endif
         </div>
         {{-- <span class="d-none d-md-inline ml-1">Admin Dashboard</span> --}}
         <ul class="nav flex-column">
             <li class="nav-item">
                 <a class="nav-link" href="{{ route('buyer.index') }}">
                     <i class="material-icons">dashboard</i>
                     <span>Dashboard</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="{{ route('buyer.create') }}">
                     <i class="material-icons">edit</i>
                     <span>Profile Setup</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="{{ route('buyer.trips') }}">
                     <i class="fa-solid fa-plane-departure"></i>
                     <span>My Recent Bookings</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="{{ route('buyer.bookingHistory') }}">
                     <i class="fa-solid fa-plane-departure"></i>
                     <span>My Booking History</span>
                 </a>
             </li>
         </ul>
     </div>
 </aside>
 <!-- End Main Sidebar -->
