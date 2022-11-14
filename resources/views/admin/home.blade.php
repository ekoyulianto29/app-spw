@extends('layout.header')

@section('content')
<div class="main-panel font-weight-light">
  <div class="content-wrapper">

    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
          <div class="d-flex align-items-end flex-wrap">
            <div class="mr-md-3 mr-xl-5">
              <h2 class="font-weight-light">Selamat Datang,</h2>
              <p class="mb-md-0">Analisis omset siswa/i pelajaran PKK.</p>
            </div>
            <div class="d-flex">
              <i class="mdi mdi-home text-muted hover-cursor"></i>
              <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Beranda&nbsp;/&nbsp;</p>
              <p class="text-primary mb-0 hover-cursor">Analisis</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body dashboard-tabs p-0">
            <ul class="nav nav-tabs px-4" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Review</a>
              </li>
                    <!-- li class="nav-item">
                      <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Penjualanan</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">Pembelian</a>
                    </li> -->
                  </ul>
                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Hari Ini</small>
                            <div class="dropdown">
                              <h5 class="mb-0 d-inline-block"><?php 
                              date_default_timezone_set('Asia/Jakarta'); 
                              echo 
                              date('d-m-Y H:i:s');?></h5>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-account-key  mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Admin</small>
                            <h5 class="mr-2 mb-0">{{$admin}}</h5>
                          </div>
                        </div>

                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-account-multiple-outline mr-3 icon-lg text-success"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Siswa</small>
                            <h5 class="mr-2 mb-0">{{$siswa}}</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Omset Tertinggi</small>
                            <h5 class="mr-2 mb-0">@rupiah($omsetTertinggi)</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-cart-outline  mr-3 icon-lg text-warning"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Usaha</small>
                            <h5 class="mr-2 mb-0">{{$usaha}}</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Grafik Omset</p>
                  <p class="mb-4">Ini adalah grafik batang, untuk melihat analisa</p>
                  <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3"></div>
                  <canvas id="myChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-light">
                <div class="card-body">
                  <p class="card-title">Omset Keseluruhan</p>
                  <h1 class="">@rupiah($omset)</h1>                  
                </div>
                <canvas class="font-weight-light" id="total-sales-chart"></canvas>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title text-center">
                    <i class="mdi mdi-trophy-variant text-warning"></i> 10 Besar siswa dengan omset tertinggi
                    <i class="mdi mdi-trophy-variant text-warning"></i> 
                  </h2>
                  <table id="example3" class="table text-capitalize" width="100%">
                <thead>
                  <tr>
                   <th>No</th>
                   <th>Nama Siswa</th>
                   <th>Tingkat/Jurusan</th>
                   <th>Total Omset (Rp)</th>
                 </tr>
               </thead>
               <tbody>
                <?php $no=1 ?> 
                  @foreach($rank as $r)
                <tr>
                 <td>{{$no++}}</td>
                 <td><i class=" mdi mdi-checkbox-marked-circle text-primary"> </i>{{$r->nama_lengkap}}</td>
                 <td>{{$r->tingkat}}-{{$r->kelas}}</td>
                 <td>@rupiah($r->omset)</td>
                 </tr>
                 @endforeach
             </tbody>
           </table>
</div>
</div>
</div>
          </div>
        </div>
<script src="vendors/chart.js/Chart.min.js"></script>
 <script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
      datasets: [{
        label: 'Omset',
        data: <?php echo json_encode($tomset); ?>,
        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
</script>
        @endsection
