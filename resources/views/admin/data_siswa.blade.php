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
            <p class="text-primary mb-0 hover-cursor">Data Siswa</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row text-uppercase">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <table id="example3" class="table" width="100%">
            <thead>
              <tr>
               <th>no</th>
               <th>nama</th>
               <th>tingkat</th>
               <th>kelas</th>
               <th>Opsi</th>
             </tr>
           </thead>
           <tbody>
            <?php $no=1 ?>
            @foreach ($data as $d)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$d->nama_lengkap}}</td>
              <td>{{$d->tingkat}}</td>
              <td>{{$d->kelas}}</td>

              <td width="5%">

                @if($cari == null)
                <b>no</b>

                @else
                <a href="{{ route('kelola_siswa.show',$d->id_siswa) }}" class="btn btn-inverse-success p-1 btn-sm"> <i class=" mdi mdi-account-card-details-outline" title="Detail Siswa"></i></a>
                @endif
              </td>

            @endforeach
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- end -->
</div>

@endsection
