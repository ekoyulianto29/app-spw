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
            <p class="text-primary mb-0 hover-cursor">Tambah Data Siswa</p>
          </div>
        </div>
      </div>
    </div>
    <div class="main-panel">        
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Form Ubah Admin</h4>
                <form class="forms-sample" method="post" action="{{route('kelola_admin.update',$data->id_user)}}">
                  @csrf
                  @method("PUT")
                  <div class="form-group">
                    <label for="exampleInputUsername1">Nama Lengkap</label>
                    <br>
                    @if ($errors->has('name'))
                    <sup class="text-danger">{{ $errors->first('name') }}</sup>
                    @endif
                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="{{$data->name}}">
                    <input type="hidden" class="form-control" name="password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Username</label>
                    <br>
                    @if ($errors->has('username'))
                    <sup class="text-danger">{{ $errors->first('username') }}</sup>
                    @endif
                    <input type="text" class="form-control" name="username" placeholder="Username" value="{{$data->username}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <br>
                    @if ($errors->has('email'))
                    <sup class="text-danger">{{ $errors->first('email') }}</sup>
                    @endif
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{$data->email}}">
                  </div>
                  <button type="submit" class="btn btn-primary mr-2" style="float: right;">Simpan Perubahan</button>
                  <a href="{{route('data_admin')}}" class="btn btn-light mr-2" style="float: right;">Batal</a>
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
