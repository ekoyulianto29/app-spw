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
          <h4 class="card-title">Informasi Akun</h4>
          <div class="media">
            <i class="icon-globe icon-md text-info d-flex align-self-start mr-3"></i>
            <div class="media-body">              
              @if (Session::has('success'))
              <div class="alert alert-success">
                {{ Session::get('success') }}
              </div>
              @endif
              <table class="table text-center">
                @foreach ($data as $d)
                <tr>
                 <td style="float: left;">Nama Lengkap</td>
                 <td class="text-capitalize">{{$d->nama_lengkap}}</td>
               </tr>
               <tr>
                 <td style="float: left;">Kata Sandi</td>
                 <td>
                  <form>
                    <input type="hidden" name="password" value="{{$d->password}}">
                    <a href="ubah_sandi/{{ $d->id_siswa}}" class="btn btn-inverse-primary" title="Ubah Kata Sandi" type="button">{{ __('********') }}</a>
                  </form>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3 grid-margin stretch-card">

  </div>

</div>
</div>

@endsection
