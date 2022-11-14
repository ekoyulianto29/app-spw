@extends('layout.header')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="container mb-2">
       <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="d-flex">
            <i class="mdi mdi-book text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Data Master&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Tambah Data Admin</p>
          </div>
        </div>
      </div>
    </div>
    <div class="main-panel">        
      <div class="content-wrapper">
        <div class="row">
          <div class="col-4"></div>
          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Form Tambah Admin</h4>
                <form class="forms-sample" method="post" action="{{route('kelola_admin.store')}}">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputUsername1">Nama Lengkap</label>
                    <br>
                     @if ($errors->has('name'))
              <sup class="text-danger">{{ $errors->first('name') }}</sup>
              @endif
                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Username</label>
                    <br>
                    @if ($errors->has('username'))
                    <sup class="text-danger">{{ $errors->first('username') }}</sup>
                    @endif
                    <input type="text" class="form-control" name="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <br>
                    @if ($errors->has('email'))
                    <sup class="text-danger">{{ $errors->first('email') }}</sup>
                    @endif
                    <input type="email" class="form-control" name="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <br>
                    @if ($errors->has('password'))
                    <sup class="text-danger">{{ $errors->first('password') }}</sup>
                    @endif
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Konfirmasi Password</label>
                    <br>
                    @if ($errors->has('password_confirmation'))
                    <sup class="text-danger">{{ $errors->first('password_confirmation') }}</sup>
                    @endif
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Password">
                  </div>
                 <div class="form-group" style="float: right;">
           <a href="{{route('data_admin')}}" class="btn btn-secondary text-white" type="button">
          Batal</a>
         <button class="btn btn-primary text-white" type="submit">Simpan</button>
        </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end -->
</div>

@endsection
