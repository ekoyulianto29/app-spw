<!DOCTYPE html>
<style type="text/css">
* {
	font-family: calibri;
}
	table tr td,
	table tr th{
		font-size: 9pt;
	}
	.header{
		width: 300px;
		text-align: left;
	}
	.header p{
		font-size: 15px;
	}
</style>
<html>
<head>
	<title>Laporan Omset</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="fw-light">
<div class="header text-uppercase">
	<h5>Laporan Omset</h5>
	<p class="text-capitalize font-monospace">Aplikasi PKK</p>
	<p>SMK TI PEMBANGUNAN CIMAHI</p>
</div>
<hr>
<h6 class="text-capitalize"># RINCIAN</h6>
<table class="table table-light text-uppercase">
	<tr>
		<th class="fw-light">Tanggal Laporan</th>
		<td><?php echo date('d/m/Y h:i:s') ?></td>
	</tr>
	<tr>
		<th>Jumlah Siswa</th>
		<td>{{$jumlahsiswa}} Siswa</td>
	</tr>
	<tr>
		<th>Jumlah Sekolah</th>
		<td>{{$jumlahsekolah}} Sekolah</td>
	</tr>
	<tr>
		<th>Jumlah Usaha</th>
		<td>{{$jumlahusaha}} Usaha</td>
	</tr>
	<tr>
		<th>Total Seluruh Omset (Rp)</th>
		<td>@rupiah($sumOmset)</td>
	</tr>
</table> 
<h6 class="text-capitalize"># LAPORAN</h6>
<table class='table table-bordered text-uppercase'>
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Siswa</th>
			<th>Nama Usaha</th>
			<th>Telp</th>
			<th>Tingkat/Kelas</th>
			<th>Asal Sekolah</th>
			<th>Omset(Rp.)</th>
		</tr>
	</thead>
	<tbody>
		@php $i=1 @endphp
		@foreach($data as $p)
		<tr>
			<td>{{ $i++ }}</td>
			<td>{{$p->nama_lengkap}}</td>
			<td>{{$p->nama_usaha}}</td>
			<td>{{$p->tlp}}</td>
			<td>{{$p->tingkat}} - {{$p->kelas}}</td>
			<td>{{$p->nama_sekolah}}</td>
			<td>@rupiah($p->omset)</td>
		</tr>
		@endforeach

		<tr>
			<th colspan="6">Total Seluruh Omset (Rp)</th>
			<td><b>@rupiah($sumOmset)<b></td>
			</tr>
		</tbody>
	</table>
	<style type="text/css"></style>
</body>
</html>