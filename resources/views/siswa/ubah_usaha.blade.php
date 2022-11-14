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
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Data Master&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Data Usaha</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
       <div class="card-header">
         Form ubah data usaha 
      </div>
      <form method="post" action="/aksiubah_usaha/{{$data->id_usaha}}">
        @csrf
        <div class="col-md-12 mt-2">
          <div class="form-group">
            <input type="hidden" name="nisn" class="col-12 validation form-control" value="{{ Auth::guard('siswa')->user()->nisn}}">
            <label class="bmd-label-floating">Nama Usaha</label>
            <input type="text" name="nama_usaha" class="col-12 validation form-control" value="{{$data->nama_usaha}}">
            @if ($errors->has('nama_usaha'))
             <sup class="text-danger">{{ $errors->first('nama_usaha') }}</sup>
           @endif
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label class="bmd-label-floating">Nomor Telepon</label>
            <input type="text" name="tlp" class="col-12 form-control" value="{{$data->tlp}}">
            @if ($errors->has('tlp'))
             <sup class="text-danger">{{ $errors->first('tlp') }}</sup>
           @endif
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label class="bmd-label-floating">Alamat</label>
            <textarea class="form-control" name="alamat">{{$data->alamat}}</textarea>
            @if ($errors->has('alamat'))
             <sup class="text-danger">{{ $errors->first('alamat') }}</sup>
           @endif
          </div>
        </div>

      <div class="col-md-12" style="text-align: right;">
        <div class="form-group">
           <a href="{{route('usaha.index')}}" class="btn btn-secondary text-white btn-sm" type="button">
          Batal</a>
         <button class="btn btn-primary text-white btn-sm" type="submit">Simpan Perubahan</button>
        </div>
      </div>
      </form>
    </div>
  </div>

  <div class="col-md-6 grid-margin stretch-card bg-white font-weight-light" style="height: auto;">
    <div class="col-md-12">
      <div class="card">
       <div class="card-header bg-primary text-white">
        Informasi Usaha
      </div>

      <div class="col-md-12 mt-3">
        <div class="form-group">
          <label class="text-primary">Nama Usaha</label>
          <br>
          <label><i class="mdi mdi-shopping"></i>{{$data->nama_usaha}}</label>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label class="text-primary">No Telepon</label>
          <br>
          <label><i class="mdi mdi-cellphone-iphone"></i> {{$data->tlp}}</label>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label class="text-primary">Alamat</label>
          <label><i class="mdi mdi-google-maps"></i> {{$data->alamat}}</label>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- end -->
</div>

@endsection
