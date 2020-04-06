<!DOCTYPE html>
<html>
	<div class="container">
		<head>
			<title>Data Guru</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		</head>
			<body>				
				@if(session('success'))
				<div class="alert alert-primary">
					{{ session('success') }}
				</div>
				@endif

				@if(session('error'))
				<div class="alert alert-danger">
					{{ session('error') }}
				</div>
				@endif
				<div class="row justify-content-center">
					<div class="col-lg-9 ">
						<h1 align="center">Data Guru</h1>
							<div class="table-responsive-md">
								<a href="{{ url('/guru/create') }}">Tambah Data</a>
								<table class="table table-borderless table-hover">
									<caption>Data Guru nya</caption>
									
									<thead>
										<tr class= "table-warning" align="center">
											<th scope="col">id</th>
											<th scope="col">NIP</th>
											<th scope="col">Nama Guru</th>
											<th scope="col">Jenis Kelamin</th>
											<th scope="col">Alamat</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>

									<tbody>
										@foreach ($guru as $row)
										<tr class="table-info" align="justify">
											<td>{{ isset($i) ? ++$i : $i = 1 }}</td>
											<td>{{ $row->nip }}</td>
											<td>{{ $row->nama_guru }}</td>
											<td align="center">{{ $row->jenis_kelamin }}</td>
											<td>{{ $row->alamat }}</td>
											<td>
													<a href="{{ url('/guru/' . $row->id . '/edit') }}" class="btn btn-outline-primary btn-sm "  style="background: darkorange ;" > Edit</a>

													<form action="{{ url('/guru/' . $row->id) }}" method="POST">
														@method('DELETE')
														@csrf
														<button style="background: lightgreen;" class="btn btn-outline-primary btn-sm" type="submit">Delete</button>
													</form>
											</td>
										</tr>
										@endforeach
									</tbody>

								</table>
							</div>



					</div>
				</div>








				<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

			</body>
	</div>
</html>