<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('backend/dist/img/travelx.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-2">
      <span class="brand-text font-weight-light">TRAVEL X</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend/dist/img/admin.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          {{-- <a href="#" class="d-block">{{Auth::guard('hotels')->Hotel_name}}</a> --}}
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/all-user')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/all-hotel')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Hotels</p>
                </a>
              </li>
              <li>
                <li class="nav-item">
                    <a href="{{URL::to('/all-activity')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Activities</p>
                    </a>
                  </li>
                  <li>
              <li class="nav-item">
                <a href="{{URL::to('/add-users')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add user</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/blocked-users')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blocked users</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{URL::to('/addhoteldash')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Hotels</p>
                </a>
              </li>
              <li>
              <li class="nav-item">
                <a href="{{URL::to('/waitingHotels')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Waitting Hotels</p>
                </a>
              </li>
              <li>
                <li class="nav-item">
                    <a href="{{URL::to('/ViewBlockedhotel')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Blocked Hotels</p>
                    </a>
                  </li>
                  <li>

                <a href="{{ route('logout') }}" class="nav-link"
                 onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
               <i class="nav-icon fas fa-copy"></i>
               <p>Logout</p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
             </p>
           </a>
         </li>


      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
