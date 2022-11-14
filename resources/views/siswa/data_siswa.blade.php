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
            <p class="text-primary mb-0 hover-cursor">Data Siswa</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 grid-margin stretch-card font-weight-light text-uppercase">
      <div class="card bg-light">
       <div class="card-header bg-primary">
        @foreach ($data as $d) 
        <a href="ubah_halsiswa/{{ $d->id_siswa}}" class="btn btn-primary text-white btn-sm" title="Ubah Data Personal" style="float: right;" type="button">
            <i class="mdi mdi-settings"></i></a>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-4 bg-light" style="text-align: center;">
            <i class="fas fa-file mt-5"></i><br>

            <img src="/gambar/{{ $d->foto}}" class="img-fluid" width="300px">

          </div>
          <div class="col-sm-8 bg-light">
            @if (Session::has('success'))
              <div class="alert alert-success">
                {{ Session::get('success') }}
              </div>
              @endif
            <table class="table table-responsive">
              <tr>
                <td>NISN </td>
                <td>{{ $d->nisn}}</td>
              </tr>
              <tr>
                <td>NPSN</td>
                <td>{{ $d->npsn}}</td>
              </tr>
              <tr>
                <td>Nama Lengkap</td>
                <td>{{ $d->nama_lengkap}}</td>
              </tr>
              <tr>
                <td>Nama Sekolah</td>
                <td>{{ $d->nama_sekolah}}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>{{ $d->alamat}}</td>
              </tr>
              <tr>
                <td>No Telp</td>
                <td>{{ $d->tlp}}</td>
              </tr>
              <tr>
                <td>Tingkat</td>
                <td>{{ $d->tingkat}}</td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td>{{ $d->kelas}}</td>
              </tr>
              <tr>
                <td>Guru Pembimbing</td>
                <td>{{ $d->guru_pembimbing}}</td>
              </tr>
              <tr>
                <td>No Telp. Guru</td>
                <td>{{ $d->tlp_guru}}</td>
              </tr>
            </table>

            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end -->
</div>

@endsection
