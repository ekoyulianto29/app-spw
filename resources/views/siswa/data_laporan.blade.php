@extends('layout.headersiswa')

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
            <p class="text-primary mb-0 hover-cursor">Laporan Data Omset</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
      <div class="card bg-light">
        <div class="card-body">
          <form class="form-inline" method="post" action="hall">
            @csrf
            <label class="text-primary">Dari&nbsp;</label>
            <select class="form-control col-12 col-md-2" name="bulandari">
             <option value="0" selected disabled> Pilih Bulan</option>
             <option value="01"> Januari</option>
             <option value="02"> Februari</option>
             <option value="03"> Maret</option>
             <option value="04"> April</option>
             <option value="05"> Mei</option>
             <option value="06"> Juni</option>
             <option value="07"> Juli</option>
             <option value="08"> Agustus</option>
             <option value="09"> September</option>
             <option value="10"> Oktober</option>
             <option value="11"> November</option>
             <option value="12"> Desember</option>
           </select>
           <select class="form-control col-12 col-md-2" name="tahundari">
             <option selected disabled> Pilih Tahun</option>
             <?php
             $now=date('Y');
             for ($a=2015;$a<=$now;$a++)
             {
               ?>
               <?php
               echo "
               <option value='$a'>$a</option>";
             }
             ?>
           </select>
           <label><i class="text-primary  mdi mdi-swap-horizontal  ml-2 mr-2"></i></label>
           <select class="form-control col-12 col-md-2" name="bulansampai">
             <option value="0" selected disabled> Pilih Bulan</option>
             <option value="01"> Januari</option>
             <option value="02"> Februari</option>
             <option value="03"> Maret</option>
             <option value="04"> April</option>
             <option value="05"> Mei</option>
             <option value="06"> Juni</option>
             <option value="07"> Juli</option>
             <option value="08"> Agustus</option>
             <option value="09"> September</option>
             <option value="10"> Oktober</option>
             <option value="11"> November</option>
             <option value="12"> Desember</option>
           </select>
           <select class="form-control col-12 col-md-2" name="tahunsampai">
             <option value="0" selected disabled> Pilih Tahun</option>
             <?php
             $now=date('Y');
             for ($a=2015;$a<=$now;$a++)
             {
               ?>
               <?php
               echo "
               <option value='$a'>$a</option>";
             }
             ?>
           </select>
           <button type="submit" class="btn btn-primary mb-2 mt-2 ml-2">Cari</button>
         </form>
       </div>
     </div>
   </div>

   <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Laporan</h4>

        <a href="cetak_omsetsiswa" target="_blank" class="btn btn-light bg-light btn-icon mr-3 pt-2 mb-2" style="float: right;" title="Cetak PDF"><i class=" mdi mdi-printer"></i></a>
        <table id="example3" class="table" style="width:100%">
        <thead>
          <tr>
           <th>No</th>
           <th>Tahun</th>
           <th>Bulan</th>
           <th>Omset (Rp)</th>
           <th>Link Usaha</th>
         </tr>
       </thead>
       <tbody>
        <?php $no=1 ?> 
        @foreach ($data as $d)
        <tr>
         <td>{{$no++}}</td>
         <td>{{$d->tahun}}</td>
         <td>{{$d->bulan}}</td>
         <td>@rupiah($d->omset)</td>
         <td width="10%"><a href="{{$d->link_usaha}}"><i class=" mdi mdi-link-variant"></i> Link</a></td>
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
