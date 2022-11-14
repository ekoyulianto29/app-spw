@extends('layout.headersiswa')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
          <div class="d-flex align-items-end flex-wrap">
            <div class="mr-md-3 mr-xl-5">
              <h2>Selamat Datang,</h2>
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
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card ">
          <div class="card-body bg-light">
            <p class="card-title font-weight-light">Omset Keseluruhan</p>
            <h1 class="font-weight-light">@rupiah($data)</h1>
          </div>                  
        </div>
      </div>
      <div class="col-md-7 grid-margin stretch-card">
       <canvas id="myChart"></canvas>
     </div>
   </div>
 </div>
 <script src="vendors/chart.js/Chart.min.js"></script>
 <script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($tahun); ?>,
      datasets: [{
        label: 'Omset',
        data: <?php echo json_encode($omset); ?>,
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