@extends('layout.headersiswa')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="container mb-2">
       <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="d-flex">
            <i class="mdi mdi-chart-areaspline text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Rekap&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Data Omset</p>
          </div>
        </div>
      </div>
        <div class="col-12 col-md-4" style="float: left;">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Form Rekap Omset</h4>
          <p class="card-description">
            Omset dibuat perbulan
          </p>
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
          <form class="forms-sample" method="post" action="/aksiubah_omset/{{$data->id_omset}}">
            @csrf
            <div class="form-group">
               <input type="hidden" name="id_usaha" value="{{$data->id_usaha}}">
               <input type="hidden" name="nisn" value="{{Auth::guard('siswa')->user()->nisn}}">
              <label for="exampleInputName1">Tahun</label>
              <br>
              @if ($errors->has('tahun'))
              <sup class="text-danger">{{ $errors->first('tahun') }}</sup>
              @endif
              <select class="form-control" name="tahun">
                <option>{{$data->tahun}}</option>
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
           </div>
           <div class="form-group">
            <label for="exampleInputCity1">Bulan</label>
            <br>
            @if ($errors->has('bulan'))
            <sup class="text-danger">{{ $errors->first('bulan') }}</sup>
            @endif
            <select class="form-control" name="bulan">
              <option value="{{$data->id_bulan}}">{{$data->bulan}}</option>
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
          </div>
          <div class="form-group">
            <label for="exampleInputCity1">Omset</label>
            <br>
            @if ($errors->has('omset'))
            <sup class="text-danger">{{ $errors->first('omset') }}</sup>
            @endif
            <div class="input-group-prepend">
              <span class="input-group-text">Rp.</span><input type="text" class="form-control" name="omset" value="{{$data->omset}}">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputCity1">Link kegiatan usaha</label>
            <br>
            @if ($errors->has('link_usaha'))
            <sup class="text-danger">{{ $errors->first('link_usaha') }}</sup>
            @endif
            <input type="text" class="form-control" id="exampleInputCity1" placeholder="Link Kegiatan" name="link_usaha" value="{{$data->link_usaha}}">
          </div>
          <div class="col-md-12" style="text-align: right;">
        <div class="form-group">
           <a href="{{route('omset.index')}}" class="btn btn-secondary text-white btn-sm" type="button">
          Batal</a>
         <button class="btn btn-primary text-white btn-sm" type="submit">
          Ubah Data</button>
        </div>
      </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-12 col-md-8" style="float: right;">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Riwayat Omset</h4>
        <table class="table table-striped" id="example3" width="100%">
          <thead>
            <td>No</td>
            <td>Tahun</td>
            <td>Bulan</td>
            <td>Omset (Rp)</td>
            <td>Link Usaha</td>

          </thead>
          <?php $no=1 ?> 
          <tbody>
            <td>{{$no++}}</td>
            <td>{{$data->tahun}}</td>
            <td>{{$data->bulan}}</td>
            <td>@rupiah($data->omset)</td>
            <td><a href="{{$data->link_usaha}}" target="_blank"><i class=" mdi mdi-link-variant"></i> link</a></td>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>

@endsection
