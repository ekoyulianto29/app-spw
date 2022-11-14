@extends('layout.header')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="container mb-2">
       <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="d-flex">
            <i class="mdi mdi-printer text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Laporan&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Omset</p>
          </div>
        </div>
        <div class="col-12 col-md-3 grid-margin stretch-card">
          <!-- <form class="form-inline ml-2" style="float: right;" action="{{route('kelola_laporan.store')}}">
            <select name="cari" class="form-control mb-2 mr-2">
              <option value="semua">Semua</option>
              <option value="asal_sekolah">Asal Sekolah</option>
              <option value="kelas">Kelas</option>
              <option value="tingkat">tingkat</option>
            </select>
            <button type="submit" class="btn btn-primary mb-2">Cari</button>
          </form> -->
        </div>
      </div>
    </div>
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body p-3">
            <a href="cetak_laporan" target="_blank" class="btn btn-inverse-danger btn-icon mr-3 pt-2 mb-2" style="float: right;" title="Cetak PDF"><i class=" mdi mdi-file-pdf-outline"></i></a>
            <a href="cetak_excel" target="_blank" class="btn btn-inverse-success btn-icon pt-2" style="float: right;" title="Cetak EXCEL"><i class=" mdi mdi-file-excel"></i></a>
          <table id="example3" class="table text-uppercase" width="100%">
            <thead>
              <tr>
               <th>No</th>
               <th>Nama Siswa</th>
               <th>Tingkat/Kelas</th>
               <th>Tahun</th>
               <th>Omset</th>
             </tr>
           </thead>
           <tbody>
            <?php $no=1 ?>
            @foreach ($data as $d)
            <tr>
             <td>{{$no++}}</td>
             <td>{{$d->nama_lengkap}}</td>
             <td>{{$d->tingkat}} - {{$d->kelas}}</td>
             <td>{{$d->tahun}}</td>
             <td width="10%">@rupiah($d->omset)</td>
           </tr>
           @endforeach
         </tbody>
       </table>
     </div>
   </div>
 </div>
</div>
<!-- end -->
</div>

@endsection
