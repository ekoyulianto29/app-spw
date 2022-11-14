<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no')}}">
  <title>Halaman Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
  <!-- endinject -->

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="{{ asset('index.html')}}"><img src="{{ asset('images/logo.svg')}}" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('images/logo-mini.svg')}}" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end bg-primary">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <i class="mdi mdi-account-circle text-white mx-0"></i>
              <span class="nav-profile-name text-white">{{ Auth::guard('user')->user()->name}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="{{route('akunadmin')}}" class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Pengaturan
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}">
                <i class="mdi mdi-logout text-primary"></i>
                Keluar
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu text-white"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Beranda</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('data_admin') }}" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-account-key menu-icon"></i>
              <span class="menu-title">Data Admin</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('data_siswa') }}" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Data Siswa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('laporan_admin') }}" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-printer menu-icon"></i>
              <span class="menu-title">Laporan</span>
              <!-- <i class="menu-arrow"></i> -->
            </a>
           <!--  <div class="collapse" id="ui-basic1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('laporan_admin') }}">Omset</a></li>
              </ul>
            </div> -->
          </li>
        </ul>
      </nav>
      <!-- partial -->
      @yield('content')

      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">©2021</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Aplikasi <a href="#">Sekolah Pencetak Wirausaha (SPW)</a></span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{ asset('vendors/base/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{ asset('vendors/chart.js/Chart.min.js')}}"></script>

<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('js/off-canvas.js')}}"></script>
<script src="{{ asset('js/hoverable-collapse.js')}}"></script>
<script src="{{ asset('js/template.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('js/dashboard.js')}}"></script>

<!-- End custom js for this page-->
<script src="{{ asset('js/jquery.cookie.js" type="text/javascript')}}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
 $(document).ready(function() {
  $('#example3').DataTable( {
    "paging": true,
   "lengthChange": true,
   "searching": true,
   "ordering": false,
   "info": true,
   "autoWidth": true,
   "responsive": true,
  } );
} );
</script>
</body>
</html>

