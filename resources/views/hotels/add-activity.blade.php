
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
    <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        </ul>
      </nav>
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
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
            Add Activity
                </h5>
            </div>
            <div class="card-body">
                <form action="{{URL::to('/creatactivity')}}" method="post">
                    <div class="mx-auto">
                    @error            ('activityName') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                    @csrf
                    <div class="form-group row">
                        <label for="activityName" class="col-sm-2 col-form-label">activity Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="activityName" placeholder="Enter activity Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="activityPrice" class="col-sm-2 col-form-label">activityPrice</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="activityPrice" placeholder="Enter activity Price" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="description" placeholder="Enter  description" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="openTime" class="col-sm-2 col-form-label">openTime</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" name="openTime" placeholder="Enter openTime" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">closeTime</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" name="closeTime" placeholder="Enter closeTime" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category_id" class="col-sm-2 col-form-label"> activity category</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="category_id" placeholder="Enter activity category" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="city_id" class="col-sm-2 col-form-label">city</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="city_id" placeholder="Enter  city" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hotel_id" class="col-sm-2 col-form-label">hotel Name</label>
                        <div class="col-sm-10">
                            <select id="Hotel_name" name="Hotel_name">
                                {{-- @foreach ($hotels as $hotel)
                                    <option value="{{ $hotel->id }}">{{ $hotel->Hotel_name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
            </div>
            <div class="card-footer " style="display: flex; justify-content: right; align-items: center">
                <button type="submit" class="btn btn-info" style="width: 20%">
                    submit
                </button>
            </div>
        </form>

        </div>
                </div>
                <div class="col-lg-1">

                </div>
            </div>
            </section>
        </div>`


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
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Menu
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>

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

