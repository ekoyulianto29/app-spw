@extends('layout.headersiswa')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="container mb-2">
       <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="d-flex">
            <i class="mdi mdi-book text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Pengaturan&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Data Akun</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
    </div>

    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Pengaturan Akun</h4>
          <div class="media">
            <i class="icon-globe icon-md text-info d-flex align-self-start mr-3"></i>
            <div class="media-body">
              <form method="post" action="/aksiubah_sandi/{{$data->id_siswa}}">
                {{ csrf_field() }}
                <table class="table text-center">
                  <div class="form-group">
                    <label>Kata sandi baru &nbsp;
                      @if ($errors->has('password'))
                      <sup class="text-danger">{{ $errors->first('password') }}</sup>
                    @endif</label>
                    <div class="input-group">
                      <input type="password" class="form-control" name="password" id="pass">
                      <div class="input-group-append">
                        <span type="button" id="show" onclick="ShowPassword()" class="btn btn-light" value=""><i class="mdi mdi-eye"></i></span>
                        <span type="button" style="display:none" class="btn btn-light" id="hide" onclick="HidePassword()"><i class="mdi mdi-eye-off"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Konfirmasi kata sandi baru &nbsp; @if ($errors->has('password_confirmation'))
                      <sup class="text-danger">{{ $errors->first('password_confirmation') }}</sup>
                    @endif</label>
                    <div class="input-group">
                      <input type="password" class="form-control" name="password_confirmation" id="pass2">
                      <div class="input-group-append">
                        <span type="button" id="show2" onclick="ShowPassword2()" class="btn btn-light" value=""><i class="mdi mdi-eye"></i></span>
                        <span type="button" style="display:none" class="btn btn-light" id="hide2" onclick="HidePassword2()"><i class="mdi mdi-eye-off"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="float: right;">
                    <a href="{{route('akun')}}" class="btn btn-light mr-2" type="button">Batal</a>
                    <button class="btn btn-primary" type="submit">Ubah Kata Sandi</button>
                  </div>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3 grid-margin stretch-card">

    </div>

  </div>
</div>
<script>

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
@endsection
