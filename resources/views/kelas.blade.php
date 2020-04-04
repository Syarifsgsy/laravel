<!DOCTYPE html>
<html>
<div class="container">
<head>
	<title>Studi kasus2</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

@if(session('success'))
<div class="alert alert-success">
	<p>Data Berhasil ditambahkan</p>
</div>
@endif

@if(session('error'))
<div class="alert alert-error">
	{{ session('error') }}
</div>
@endif

<h1><p align="center" style="font-family: sans-serif; color: orange;">Belajar PHP. Halaman dari Controllers.<br></p></h1>

<p align="center"><a href="{{ url('/kelas/create') }}" >Tambah Data</a></p>
<table border="1" align="center">
	<tr style="color: lightgreen; background-color: purple;" align="center">
		<th>Id</th>
		<th>Nama Kelas</th>
		<th>Lokasi Ruangan</th>
		<th>Jurusan</th>
		<th>Nama Wali Kelas</th>
		<th>Aksi</th>
		
	</tr>
	@foreach ($kelas as $row)
	<tr style="color: orangered; background-color: cyan;" align="center">
		<td>{{ isset($i) ? ++$i : $i = 1 }}</td>
		<td>{{ $row->nama_kelas }}</td>
		<td>{{ $row->lokasi_ruangan }}</td>
		<td>{{ $row->jurusan }}</td>
		<td>{{ $row->nama_wali_kelas }}</td>
		<td>
			<a href="{{ url('/kelas/' . $row->id . '/edit') }}" class="btn btn-outline-primary btn-sm "  style="background: lightgreen;" > Edit</a>

			<form action="{{ url('/kelas/' . $row->id) }}" method="POST">
				@method('DELETE')
				@csrf
				<button style="background: darkorange;" class="btn btn-outline-primary btn-sm" type="submit">Delete</button>
			</form>
		</td>
	</tr>
	@endforeach
</table>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</div>>
</html>
