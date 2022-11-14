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
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
       <div class="card-header">
        Biodata Siswa 
        @if (Session::has('sukses'))
        <div class="alert alert-success">
          {{ Session::get('sukses') }}
        </div>
        @endif
        @if (Session::has('gagal'))
        <div class="alert alert-danger">
          {{ Session::get('gagal') }}
        </div>
        @endif
        <form method="post" action="/hsiswa/{{$data->id_siswa}}" enctype="multipart/form-data">
        </div>
        @csrf
        <div class="card-body p-3">
          <div class="row mt-2">
            <div class="col-sm-4 bg-light" style="text-align: center;">
              <i class="fas fa-file mt-5"></i><br>
              <img src="/gambar/{{ $data->foto}}" width="300px" class="img-fluid">
              <input type="hidden" name="id_siswa" value="{{$data->id_siswa}}">
              <input type="file" name="foto" id="input-file-now" data-plugin="dropify" 
              data-default-file="{{ $data->foto }}">
              @if ($errors->has('foto'))
              <sup class="text-danger">{{ $errors->first('foto') }}</sup>
              @endif
            </div>
            <div class="col-sm-8">
              <table class="table table-responsive">
                <tr>
                  <th>NISN</th>
                  <td>
                    <input type="hidden" value="{{ $data->password}}" name="password" class="form-control">
                    <input type="text" value="{{ $data->nisn}}" name="nisn" class="form-control"></td>
                    <td>@if ($errors->has('nisn'))
                     <sup class="text-danger">{{ $errors->first('nisn') }}</sup>
                   @endif</td>
                 </tr>
                 <tr>
                  <th>Nama Lengkap 
                  </th>
                  <td><input type="text" value="{{ $data->nama_lengkap}}" name="nama_lengkap" class="form-control" ></td>
                  <td>  @if ($errors->has('nama_lengkap'))
                   <sup class="text-danger">{{ $errors->first('nama_lengkap') }}</sup>
                 @endif</td>
               </tr>
               <tr>
                <th>No Telp 
                </th>
                <td><input type="text" value="{{ $data->tlp}}" name="tlp" class="form-control"></td>
                <td>@if ($errors->has('tlp'))
                 <sup class="text-danger">{{ $errors->first('tlp') }}</sup>
               @endif</td>
             </tr>
             <tr>
              <th>Tingkat 
              </th>
              <td><select name="tingkat" class="form-control">
                <option value="{{ $data->tingkat}}" disabled>- Pilih Tingkat -</option>
                <option value="x">X</option>
                <option value="xi">XI</option>
                <option value="xii">XII</option>
              </select></td>
              <td> @if ($errors->has('tingkat'))
               <sup class="text-danger">{{ $errors->first('tingkat') }}</sup>
             @endif</td>
           </tr>
           <tr>
            <th>Kelas 
            </th>
            <td><input type="text" value="{{ $data->kelas}}" name="kelas" class="form-control"></td>
            <td>@if ($errors->has('kelas'))
             <sup class="text-danger">{{ $errors->first('kelas') }}</sup>
           @endif</td>
         </tr>
         <tr>
          <th>NPSN
          </th>
          <td>
            <input type="text" value="{{ $data->npsn}}" id="npsn" name="npsn" class="form-control"></td>
            <td>  @if ($errors->has('npsn'))
             <sup class="text-danger">{{ $errors->first('npsn') }}</sup>
           @endif</td>
           <td>
            <div id="nama_sekolah"></div></td>
          </tr>
          <tr>
            <th>Nama Sekolah
            </th>
            <td><input type="text" value="{{ $data->nama_sekolah}}" id="ns" name="nama_sekolah" class="form-control"></td>
            <td>@if ($errors->has('nama_sekolah'))
             <sup class="text-danger">{{ $errors->first('nama_sekolah') }}</sup>
           @endif</td>
         </tr>
         <tr>
          <th>Alamat Sekolah 
          </th>
          <td><textarea name="alamat" class="form-control">{{ $data->alamat}}</textarea></td>
          <td> @if ($errors->has('alamat'))
           <sup class="text-danger">{{ $errors->first('alamat') }}</sup>
         @endif</td>
       </tr>

       <th>Guru Pembimbing 
       </th>
       <td><input type="text" value="{{ $data->guru_pembimbing}}" name="guru_pembimbing" class="form-control" ></td>
     </tr>
     <td> @if ($errors->has('guru_pembimbing'))
       <sup class="text-danger">{{ $errors->first('guru_pembimbing') }}</sup>
     @endif</td>
     <tr>
      <th>No Telp. Guru 
      </th>
      <td><input type="text" value="{{ $data->tlp_guru}}" name="tlp_guru" class="form-control" ></td>
      <td>@if ($errors->has('tlp_guru'))
       <sup class="text-danger">{{ $errors->first('tlp_guru') }}</sup>
     @endif</td>
   </tr>
   <tr>
    <th></th>
    <td>
      <a href="{{ route('d_siswa') }}" class="btn btn-secondary text-white btn-sm" type="button"> Batal</a>
        <button class="btn btn-primary text-white btn-sm" type="submit">
         Simpan Perubahan</button>
        </td>
      </tr>
    </table>

  </form>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- end -->
</div>
@endsection
