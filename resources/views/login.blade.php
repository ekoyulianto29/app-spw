<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login - Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body style="background-color: white;">
  <div class="container bg-white">
    <div class="container-fluid page-body-wrapper full-page-wrapper bg-white">
      <div class="content-wrapper align-items-center auth bg-white">
        <div class="row gx-0 mt-3">



          <div class="col-md-6 mt-5">
            <img src="images/logo.svg" class="img-fluid" style="width: 100px;">
                  <img src="images/logo-vokasi-smk.png" class="img-fluid" style="width: 100px;">
            <img src="assets/img/features.png" alt="Image" class="img-fluid mt-5">
          </div>

          <div class="col-md-6 contents mt-3 pt-3">
            <div class="row justify-content-center">
              <div class="col-md-8 mt-5">

                <div class="mb-4 text-center">
                  <h3 class="mt-4 text-center font-weight-light">ADMIN <span class="text-success">APLIKASI</span> <b class="text-primary">SPW</b> 2021</h3>
                  <!-- <p class="font-weight-normal mb-4">Selamat Datanf calon pengusaha sukses!</p> -->
                </div>
                @if(session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Upss!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                @if (Session::has('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger">
                  {{ Session::get('error') }}
                </div>
                @endif
                <form class="pt-3"  action="{{ route('login') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg bg-white"placeholder="email" name="email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg bg-white" id="exampleInputPassword1" name="password" placeholder="Kata Sandi">
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Masuk</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input">
                        Ingat Saya
                      </label>
                    </div>
                    <a href="#" class="auth-link text-black">Lupa kata sandi?</a>
                  </div>
                  <div class="text-center mt-4 font-weight-light">Kembali ke
                    <a href="/" class="text-success"> Beranda</a>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>


        <!-- content-wrapper ends -->
      </div>
    </div>
  </div>
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="../../js/off-canvas.js"></script>
<script src="../../js/hoverable-collapse.js"></script>
<script src="../../js/template.js"></script>
<!-- endinject -->
</body>

</html>
