<!DOCTYPE html>
<html lang="en">

<head>
  <!-- meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Registrasi - Siswa</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <!-- <link rel="shortcut icon" href="../../images/favicon.png" /> -->
</head>
<body>
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
      <div class="row w-100 mx-0">
        <div class="col-lg-8 mx-auto">
          <div class=" bg-white auth-form-light text-left py-3 px-2 px-sm-3">
            <h3 class="mt-2 text-center font-weight-light">REGISTRASI <span class="text-success">APLIKASI</span> <b class="text-primary">SPW</b></h3>
            <hr>
            <form method="post" action="{{route('aregistersiswa')}}" enctype="multipart/form-data">
              @csrf

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">NISN
                      @if ($errors->has('nisn'))
                      <sup class="text-danger">{{ $errors->first('nisn') }}</sup>
                    @endif</label>
                  </label>
                  <input type="text" name="nisn" class="col-12 validation form-control" value="{{ old('nisn') }}" placeholder="NISN">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Nama Lengkap
                    @if ($errors->has('nama_lengkap'))
                    <sup class="text-danger">{{ $errors->first('nama_lengkap') }}</sup>
                  @endif</label>
                </label>
                <input type="text" name="nama_lengkap" class="col-12 form-control" value="{{ old('nama_lengkap') }}" placeholder="Nama Lengkap">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
                <label class="bmd-label-floating">Telp
                  @if ($errors->has('tlp'))
                  <sup class="text-danger">{{ $errors->first('tlp') }}</sup>
                @endif</label>
              </label>
              <input type="text" name="tlp" class="col-12 form-control" value="{{ old('tlp') }}" placeholder="No Telp">
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group">
              <label class="bmd-label-floating">Foto
                @if ($errors->has('foto'))
                <sup class="text-danger">{{ $errors->first('foto') }}</sup>
              @endif</label>
            </label>
            <input type="file" name="foto" class="col-12 form-control" value="{{ old('foto') }}">
          </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group">
            <label class="bmd-label-floating">Tingkat
              @if ($errors->has('tingkat'))
              <sup class="text-danger">{{ $errors->first('tingkat') }}</sup>
            @endif</label>
          </label>
          <select class="col-12 form-control text-dark" name="tingkat" value="{{ old('tingkat') }}">
           <option selected disabled> Pilih Tingkat</option>
           <option>X</option>
           <option>XI</option>
           <option>XII</option>
         </select>
       </div>
     </div>
     <div class="col-lg-4">
      <div class="form-group">
       <label class="bmd-label-floating">Jurusan/Kelas
         @if ($errors->has('kelas'))
         <sup class="text-danger">{{ $errors->first('kelas') }}</sup>
       @endif
      </label>
       <input type="text" name="kelas" class="col-12 form-control mb-1" value="{{ old('kelas') }}" placeholder="Jurusan/kelas">
     <sup class="text-primary">* Contoh : Multimedia - A</sup>
      </div>
   </div>
 </div>

 <div class="row">
  <div class="col-lg-6">
    <div class="form-group">
      <label>Kata Sandi &nbsp;
        @if ($errors->has('password'))
        <sup class="text-danger">{{ $errors->first('password') }}</sup>
      @endif</label>
      <div class="input-group">
        <input type="password" class="form-control" name="password" id="pass" placeholder="Kata Sandi">
        <div class="input-group-append">
          <span type="button" id="show" onclick="ShowPassword()" class="btn btn-light" value=""><i class="mdi mdi-eye"></i></span>
          <span type="button" style="display:none" class="btn btn-light" id="hide" onclick="HidePassword()"><i class="mdi mdi-eye-off"></i></span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
     <label>Konfirmasi kata sandi baru &nbsp; @if ($errors->has('password_confirmation'))
      <sup class="text-danger">{{ $errors->first('password_confirmation') }}</sup>
    @endif</label>
    <div class="input-group">
      <input type="password" class="form-control" name="password_confirmation" id="pass2" placeholder="Konfirmasi Kata Sandi">
      <div class="input-group-append">
        <span type="button" id="show2" onclick="ShowPassword2()" class="btn btn-light" value=""><i class="mdi mdi-eye"></i></span>
        <span type="button" style="display:none" class="btn btn-light" id="hide2" onclick="HidePassword2()"><i class="mdi mdi-eye-off"></i></span>
      </div>
    </div>
  </div>
</div>
</div>

<div class="row">
  <div class="col-lg-6">
    <div class="form-group">
      <label class="bmd-label-floating">Guru Pembimbing
        @if ($errors->has('guru_pembimbing'))
        <sup class="text-danger">{{ $errors->first('guru_pembimbing') }}</sup>
      @endif</label>
    </label>
    <input type="text" name="guru_pembimbing" class="col-12 form-control" value="{{ old('guru_pembimbing') }}" placeholder="Guru Pembimbing">
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label class="bmd-label-floating">Telp Guru Pembimbing
      @if ($errors->has('tlp_guru'))
      <sup class="text-danger">{{ $errors->first('tlp_guru') }}</sup>
    @endif</label>
  </label>
  <input type="text" name="tlp_guru" class="col-12 form-control" value="{{ old('tlp_guru') }}" placeholder="Telp Guru Pembimbing">
</div>
</div>
</div>

<div class="row">
  <div class="col-lg-6">
    <div class="form-group">
     <label class="bmd-label-floating">
      NPSN  
      @if ($errors->has('npsn'))
      <sup class="text-danger">{{ $errors->first('npsn') }}</sup>
    @endif</label>
    <input type="text" name="npsn" class="col-12 form-control" id="npsn" value="{{ old('npsn') }}" placeholder="NPSN">
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label class="bmd-label-floating">Nama Sekolah
      @if ($errors->has('nama_sekolah'))
      <sup class="text-danger">{{ $errors->first('nama_sekolah') }}</sup>
    @endif</label>
  </label>
  <div id="nama_sekolah"></div>
  <input type="text" name="nama_sekolah" class="col-12 form-control" id="ns" value="{{ old('nama_sekolah') }}" placeholder="Nama Sekolah">
</div>
</div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="form-group">
      <label class="bmd-label-floating">Alamat Sekolah
        @if ($errors->has('alamat'))
        <sup class="text-danger">{{ $errors->first('alamat') }}</sup>
      @endif</label>
    </label>
    <textarea type="text" name="alamat" class="col-12 form-control" placeholder="Alamat" id="ala">{{ old('alamat') }}</textarea>
  </div>
</div>
</div>

<div class="row">
  <div class="col-12 col-md-12" style="text-align: right;">
    <div class="form-group">                      
      <input type="submit" class="btn btn-primary col-12" value="Registrasi">
    </div>
  </div>
  <div class="col-12 col-md-12 text-center mt-3 font-weight-light">
    Sudah memiliki Akun? <a href="loginsiswa" class="text-primary">Login</a>
  </div>
</div>

</form>
</div>
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
<script>
  $(document).ready(function(){

   $('#npsn').keyup(function(){ 
    var query = $(this).val();
    if(query != '')
    {
     var _token = $('input[name="_token"]').val();
     $.ajax({
      url:"{{ route('getsekolah') }}",
      method:"POST",
      data:{query:query, _token:_token},
      success:function(data){
       $('#nama_sekolah').fadeIn();  
       $('#nama_sekolah').html(data);
     }
   });
   }
 });

     
   $(document).on('click', 'li', function(){  

    $('#ns').val($(this).text());  

    $('#nama_sekolah').fadeOut();  
  });  


 });
</script>
<script>
  function CekNPSN() {
    var edValue = document.getElementById("npsn");
    var s = edValue.value;

    var lblValue = document.getElementById("nama_sekolah");
    lblValue.innerText = "Nama Sekolah: " + s;

    var lblValue = document.getElementById("alamat");
    lblValue.innerText = "Alamat Sekolah: " + s;

    //var s = $("#edValue").val();
    //$("#lblValue").text(s);    
  }

  function ShowPassword()
  {

   if(document.getElementById("pass").value!="")
   {
    document.getElementById("pass").type="text";
    document.getElementById("show").style.display="none";
    document.getElementById("hide").style.display="block";
  }
}

function HidePassword()
{
  if(document.getElementById("pass").type == "text")
  {
    document.getElementById("pass").type="password"
    document.getElementById("show").style.display="block";
    document.getElementById("hide").style.display="none";
  }
}

function ShowPassword2()
{

 if(document.getElementById("pass2").value!="")
 {
  document.getElementById("pass2").type="text";
  document.getElementById("show2").style.display="none";
  document.getElementById("hide2").style.display="block";
}
}

function HidePassword2()
{
  if(document.getElementById("pass2").type == "text")
  {
    document.getElementById("pass2").type="password"
    document.getElementById("show2").style.display="block";
    document.getElementById("hide2").style.display="none";
  }
}
</script>
</body>
</html>
