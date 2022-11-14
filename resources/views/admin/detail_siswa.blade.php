@extends('layout.header')

@section('content')
<br>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="container mb-2">
       <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="d-flex">
            <i class="mdi mdi-book text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Data Detail&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Data Siswa</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-white p-2">

          <!-- <a href="{{ route('data_siswa') }}" class="btn btn-success btn-sm" style="float: right;" type="button">Kembali</a> -->
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#disposisi" data-toggle="tab">Riwayat Omset</a></li>
            <li class="nav-item"><a class="nav-link" href="#sm" data-toggle="tab">Profil Siswa</a></li>
          </ul>
        </div>

        <div class="card-body">
          <div class="tab-content">
            
            <!-- /.tab-pane -->
            <div class="active tab-pane" id="disposisi">
             <div class="row">
               <div class="col-6">
                 <h4 class="text-capitalize"><i class="mdi mdi mdi-account-card-details"></i>
                   :  {{ $data->nama_lengkap }}</h4>
                 </div>
                 <div class="col-6">
                   <h4 align="right">
                     Total Omset : <b class="text-success">@rupiah($omsetSiswa)</b><br><br>
                    </h4>
                   </div>
                 </div>
                 <div class="row bg-light mt-5">
                   <div class="col-sm-4 mt-3 mb-3">
                    <table class="">
                     <tr>
                      <th>NISN</th>
                    </tr>
                    <tr>
                      <td>{{$data->nisn}}</td>
                    </tr>
                    <tr>
                      <th>Tingkat/Kelas</th>
                    </tr>
                    <tr>
                      <td>{{$data->tingkat}} - {{$data->kelas}}</td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-4 mt-3">
                 <table>
                   <tr>
                    <th>Asal Sekolah</th>
                  </tr>
                  <tr>
                    <td>{{$data->nama_sekolah}}</td>
                  </tr>
                  <tr>
                    <th>Nama Toko</th>
                  </tr>
                  <tr>
                    <td>{{$data->nama_usaha}}</td>
                  </tr>
                </table>
              </div>
              <div class="col-sm-4 mt-3" style="text-align: right;"> 
                <table style="float: right;">
                 <tr>
                  <th>Terakhir Pembaharuan :</th>
                </tr>
                <tr>
                  <td>{{$data->updated_at}}</td>
                </tr>
               <!--  <tr>
                  <th></th>
                </tr>
                <tr>
                  <td>{{$rangking}}</td>
                </tr> -->
              </table>
            </div>
          </div>
          <hr>
          <div class="row mt-3 mb-3">
            <div class="col-12">
              <b>Riwayat Omset</b>
              <table id="example3" class="table" width="100%">
                <thead>
                  <tr>
                   <th>No</th>
                   <th>Tahun</th>
                   <th>Bulan</th>
                   <th>Omset (Rp)</th>
                   <th width="10%">Link Usaha</th>
                 </tr>
               </thead>
               <tbody>
                <?php $no=1 ?> 
                @foreach($data2 as $d)
                <tr>
                 <td>{{$no++}}</td>
                 <td>{{$d->tahun}}</td>
                 <td>{{$d->bulan}}</td>
                 <td>@rupiah($d->omset)</td>
                 <td><a href="{{$d->link_usaha}}" target="_blank" title="{{$d->link_usaha}}"><i class=" mdi mdi-link-variant"></i> link</a></td>
               </tr>
               @endforeach
             </tbody>
           </table>
         </div>
       </div>

       <!-- /.tab-pane -->

     </div> 
     <div class="tab-pane" id="sm">

              @php $no = 1; @endphp
              <div class="row mt-2">
                <div class="col-sm-4 bg-light" style="text-align: center;">
                  <i class="fas fa-file mt-5"></i><br>
                  @if ($errors->has('foto'))
                  <span class="text-danger">{{ $errors->first('foto') }}</span>
                  @endif

                  <img src="/gambar/{{ $data->foto}}" width="300px" class="img-fluid">

                </div>
                <div class="row">
                  <div class="col-sm-8">
                    <table class="table text-capitalize">
                      <tr>
                        <th>NISN </th>
                        <td>{{ $data->nisn}}</td>
                      </tr>
                      <tr>
                        <th>NPSN</th>
                        <td>{{ $data->npsn}}</td>
                      </tr>
                      <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $data->nama_lengkap}}</td>
                      </tr>
                      <tr>
                        <th>No Telp</th>
                        <td>{{ $data->tlp}}</td>
                      </tr>
                      <tr>
                        <th>Tingkat</th>
                        <td>{{ $data->tingkat}}</td>
                      </tr>
                      <tr>
                        <th>Kelas</th>
                        <td>{{ $data->kelas }}</td>
                      </tr>
                      <tr>
                        <th>Guru Pembimbing</th>
                        <td>{{ $data->guru_pembimbing}}</td>
                      </tr>
                      <tr>
                        <th>No Telp. Guru</th>
                        <td>{{ $data->tlp_guru}}</td>
                      </tr>
                      <tr>
                        <th>Total Seluruh Omset</th>
                        <td class="text-success"><h4>@rupiah($omsetSiswa)</h4></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div> 
   </div> 
 </div>
</div> 
</div> 
</div>
</div>
@endsection