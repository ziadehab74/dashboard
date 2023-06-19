
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Travel x  | Dashboard </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/notfication/toastr.min.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('backendplugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backendplugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backendplugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
</head>
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Hotel Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->


            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
</div>
        </div>
        <div class="col-lg-1">

        </div>
    </div>
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
                        <li class="nav-item">
                            <a href="{{URL::to('/approve_user')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Add Activity</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{URL::to('/approve_user')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Show Invoices</p>
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






    </section>
</div>
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022-2023 <a href="#">Travel x</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('backend/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('backend/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('backend/dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('backend/dist/js/pages/dashboard2.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/gins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('backend/plugins/notfication/toastr.min.js')}}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
    $('button5').on('click',function(){
        toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
toastr["success"]("Have fun storming the castle!")
    })
  </script>
</body>
</html>

