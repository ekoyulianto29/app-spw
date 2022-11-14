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

  <div class="col-md-6 grid-margin stretch-card font-weight-light" style="height: auto;">
    <div class="col-md-12">
      <div class="card p-3">
        <img src="images/toko.jpg" class="img-fluid">
      <!--   <div class="card-header bg-light">
          Informasi Usaha
        </div> -->

        @foreach($data as $d)
        <div class="row mt-3">
          <div class="col-6">
            <div class="form-group">
              <label class="text-primary">Nama Usaha</label>
              <br>
              <label><i class="mdi mdi-shopping"></i>{{$d->nama_usaha}}</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label class="text-primary">No Telepon</label>
              <br>
              <label><i class="mdi mdi-cellphone-iphone"></i> {{$d->tlp}}</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="text-primary">Alamat</label>
              <br>
              <label><i class="mdi mdi-google-maps"></i> {{$d->alamat}}</label>
            </div>
          </div>
        </div>
        <div class="col-md-12" style="text-align: right;">
          <div class="form-group">
           <!-- <a data-toggle="modal" data-target="#modalHapus" class="btn btn-danger text-white btn-sm" type="button">
            <i class="mdi mdi-delete"></i> Hapus</a> -->
            <a href="ubah_usaha/{{ $d->id_usaha }}" class="btn btn-primary text-white btn-sm" type="button" title="Ubah Usaha">
              <i class="mdi mdi-settings"></i></a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    @if ($cek == 1)
    @else
    <div class="col-md-6 grid-margin stretch-card" style="height: 500px;">
      <div class="card">
       <div class="card-header bg-primary text-white">
        Form Data Usaha 
      </div>
      @if (Session::has('success'))
            <div class="alert alert-success">
              {{ Session::get('success') }}
            </div>
            @endif
      <form method="post" action="{{ route('usaha.store') }}">
        @csrf
        <div class="col-md-12 mt-2">
          <div class="form-group">
            
            
            <input type="hidden" name="nisn" class="col-12 validation form-control" value="{{ Auth::guard('siswa')->user()->nisn}}">
            <label class="bmd-label-floating">Nama Usaha</label>
            <input type="text" name="nama_usaha" class="col-12 validation form-control">
    
            @if ($errors->has('nama_usaha'))
                    <sup class="text-danger">{{ $errors->first('nama_usaha') }}</sup>
                    @endif
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label class="bmd-label-floating">Nomor Telepon</label>
            <input type="text" name="tlp" class="col-12 form-control">
            @if ($errors->has('tlp'))
                    <sup class="text-danger">{{ $errors->first('tlp') }}</sup>
                    @endif
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label class="bmd-label-floating">Alamat</label>
            <textarea class="form-control" name="alamat"></textarea>
            @if ($errors->has('alamat'))
                    <sup class="text-danger">{{ $errors->first('alamat') }}</sup>
                    @endif
          </div>
        </div>
        <div class="col-12 col-md-4" style="text-align: right; float: right;">
          <div class="form-group">                      
            <button type="submit" class="btn btn-primary col-9">Simpan</button>
          </div>
        </div>
      </form>
    </div>
    @endif
  </div>
  </div>
  <!-- end -->
</div>
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan<h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Hapus Data?</div>
        <div class="modal-footer">
          @foreach($data as $d)
          <button class="btn btn-light" type="button" data-dismiss="modal">Tidak</button>
          <a class="btn btn-danger" href="hapususaha/{{ $d->id_usaha}}" onclick="event.preventDefault();
          document.getElementById('hapus-data').submit();">Ya</a>
          <form id="hapus-data" action="hapususaha/{{ $d->id_usaha}}" method="get" style="display: none;">
            @csrf
          </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
