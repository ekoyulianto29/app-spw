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
        <div class="d-flex justify-content-between align-items-end flex-wrap">
           <button type="button" class="btn btn-primary btn-icon mr-3" title="Tambah Data" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="mdi mdi-plus text-white"></i>
          </button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Rekap Omset</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="forms-sample" method="post" action="{{ route('omset.store') }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Tahun</label>
                      <input type="hidden" name="nisn" value="{{Auth::guard('siswa')->user()->nisn}}">
                      <br>
                      @if ($errors->has('tahun'))
                      <sup class="text-danger">{{ $errors->first('tahun') }}</sup>
                      @endif
                      <select class="form-control" name="tahun">
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
                   </div>
                   <div class="form-group">
                    <label for="exampleInputCity1">Bulan</label>
                    <br>
                    @if ($errors->has('bulan'))
                    <sup class="text-danger">{{ $errors->first('bulan') }}</sup>
                    @endif
                    <select class="form-control" name="bulan">
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
                  </div>
                  <div class="form-group">
                    <label for="exampleInputCity1">Omset</label>
                    <br>
                    @if ($errors->has('omset'))
                    <sup class="text-danger">{{ $errors->first('omset') }}</sup>
                    @endif
                    <div class="input-group-prepend">
                      <span class="input-group-text form-control" style="width: 40px;">Rp.</span>
                      <input type="text" class="form-control" name="omset" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputCity1">Link kegiatan usaha</label>
                    <br>
                    @if ($errors->has('link_usaha'))
                    <sup class="text-danger">{{ $errors->first('link_usaha') }}</sup>
                    @endif
                    <input type="text" class="form-control mb-1" id="exampleInputCity1" placeholder="Link Kegiatan" name="link_usaha">
                    <sup class="text-primary">
                      <i>* Contoh URL : https://www.namausaha.com</i><br>
                    </sup>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="col-12 grid-margin stretch-card" style="float: right;">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Riwayat Omset</h4>
          <table id="example3" class="table">
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
            <thead>
              <tr>
               <th>No</th>
               <th>Tahun</th>
               <th>Bulan</th>
               <th>Omset (Rp)</th>
               <th>Link Usaha</th>
               <th width="10%">Aksi</th>
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
             <td><a href="{{$d->link_usaha}}" target="_blank"><i class=" mdi mdi-link-variant"></i> link</a></td>
             <td><a href="ubah_omset/{{ $d->id_omset }}" class="btn btn-inverse-primary btn-rounded p-1"> <i class="mdi mdi-settings-outline" title="Ubah"></i></a>
              <form action="{{ route('omset.destroy',$d->id_omset) }}" method="POST">
                      @csrf
 @method('DELETE')
 <button type="submit" class="btn btn-inverse-danger btn-rounded p-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"> <i class="mdi mdi-delete-outline" title="Hapus"></i></button>         
                  </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notif<h5>
          @foreach($data as $d)
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Beneran nih dihapus?</div>
        <div class="modal-footer">
          <button class="btn btn-light" type="button" data-dismiss="modal">Ga jadi</button>
          <a class="btn btn-danger" href="hapusomset/{{ $d->id_omset}}" onclick="event.preventDefault();
          document.getElementById('hapus-data').submit();">Iya</a>
          <form id="hapus-data" action="hapusomset/{{ $d->id_omset}}" method="get" style="display: none;">
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
