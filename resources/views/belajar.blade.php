<div class="container">
Belajar PHP. Halaman dari Controllers.<br>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
<h1 class="display-4" >Daftar Siswa</h1>

<a href="{{ url('/siswa/create') }}">Tambah Data</a>
<table border="1">
	<tr style="background-color: lightgreen;">
		<th>No</th>
		<th>NIS</th>
		<th>Nama Lengkap</th>
		<th>Jenis Kelamin</th>
		<th>Golongan Darah</th>
		<th>Aksi</th>
	</tr>
	@foreach ($siswa as $row)
	<tr style="background-color: lightyellow;">
		<td>{{ isset($i) ? ++$i : $i = 1 }}</td>
		<td>{{ $row->nis }}</td>
		<td>{{ $row->nama_lengkap }}</td>
		<td>{{ $row->jenkel }}</td>
		<td>{{ $row->goldar }}</td>
		<td>
			<a href="{{ url('/siswa/' . $row->id . '/edit') }}" class="btn btn-outline-primary btn-sm "  style="background: lightgreen;" > Edit</a>

			<form action="{{ url('/siswa/' . $row->id) }}" method="POST">
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

<!-- fungsi update:
fungsi update ini bertugas untuk megirimkan data yang sudah diubah. Isi dari fungsi ini tidak jauh beda dengan fungsi store(insert data) dimana disini kita membuat validasi juga. Bedanya di fungsi ini kita menggunakan where() untuk pengkondisian data mana yang akan diedit, update() untuk mengubah data yang lama menjadi data yang baru. Baris unset pada codingan diatas bertujuan untuk menghapus data dengan kunci _token beserta _methodnya pada array $input. Lalu disini juga terdapat pengkondisian mengenai berhasil/tidaknya data diedit. -->

<!-- fungsi destroy:
 fungsi destroy ini bertugas untuk menghapus data yang dipilih. Sama seperti fungsi edit, disini kita menggunakan where() untuk pengkondisian data mana yang akan dihapus serta delete() untuk menghapus data tersebut. Setelah itu disini juga terdapat pengkondisian mengenai berhasil/tidaknya data dihapus. -->
</body>
</html>
</div>

