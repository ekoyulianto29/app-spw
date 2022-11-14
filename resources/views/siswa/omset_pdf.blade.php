<!DOCTYPE html>
<html>
<head>
	<title>Laporan Omset</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="fw-light">
	<style type="text/css">
	table tr td,
	table tr th{
		font-size: 9pt;
	}
	*{
		font-family: jokerman;
	}
	.header{
		width: 300px;
		text-align: left;
	}
	.header p{
		font-size: 15px;
	}
</style>
<div class="header text-uppercase">
	@foreach($usaha as $u)
	<h5>{{$u->nama_usaha}}</h5>
	<p class="text-capitalize font-monospace">{{$u->alamat}}</p>
	<p class="text-capitalize">Telp. {{$u->tlp}}</p>
	@endforeach
</div>
<hr>
<h6 class="text-capitalize"># Identitas Siswa</h6>
<table class="table table-light text-uppercase">
	@foreach($siswa as $s)
	<tr>
		<th class="fw-light">Nama Pemilik Toko</th>
		<td>{{$s->nama_lengkap}}</td>
	</tr>
	<tr>
		<th>Asal Sekolah</th>
		<td>{{$s->nama_sekolah}}</td>
	</tr>
	<tr>
		<th>Tingkat/Jurusan</th>
		<td>{{$s->tingkat}} - {{$s->kelas}}</td>
	</tr>
	<tr>
		<th>Guru Pembimbing</th>
		<td>{{$s->guru_pembimbing}}</td>
	</tr>
	@endforeach
</table> 
<h6 class="text-capitalize"># Laporan Omset</h6>
<table class='table table-bordered'>
	<thead>
		<tr>
			<th>No</th>
			<th>Tahun</th>
			<th>Bulan</th>
			<th>Link Usaha</th>
			<th>Omset (Rp.)</th>
		</tr>
	</thead>
	<tbody>
		@php $i=1 @endphp
		@foreach($data as $p)
		<tr>
			<td>{{ $i++ }}</td>
			<td>{{$p->tahun}}</td>
			<td>{{$p->bulan}}</td>
			<td><a href="{{$p->link_usaha}}">Link Disini</a> <b>atau</b> <i class="text-muted">{{$p->link_usaha}}</i></td>
			<td>@rupiah($p->omset)</td>
		</tr>
		@endforeach

		<tr>
			<th colspan="4">Total Seluruh Omset</th>
			<td><b>@rupiah($sumOmset)<b></td>
		</tr>
	</tbody>
</table>
<style type="text/css"></style>
</body>
</html>