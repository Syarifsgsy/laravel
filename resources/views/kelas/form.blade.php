@if(session('error'))
<div class="alert alert-error">
	{{ session('error') }}
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-warning">
	<strong>gapapaPerhatian!!!</strong><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<!DOCTYPE html>
<html>
<head>
	<title>Form Data Kelas</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 ">	
	<h1 align="center">Form Data Kelas</h1>
	<form action="{{ url('kelas') }}" method="POST">
		@csrf

		<div class="form-group">
		<label for="nama_kelas">Nama Kelas</label>
		<input type="text" id="nama_kelas" class="form-control bg-light border border-danger" placeholder="Masukkan Nama Kelas Anda" name="nama_kelas" value="{{ old('nama_kelas')	 }}"/>
		</div>

		<div class="form-group">
		<label for="lokasi_ruangan">Lokasi Ruangan</label>
		<input type="text" id="lokasi_ruangan" class="form-control  bg-light border border-danger" placeholder="Masukkan Lokasi Ruangan Anda" name="lokasi_ruangan" value="{{ old('lokasi_ruangan')	 }}">
		</div>

		<div class="form-group">
		<label for="nama_wali_kelas">Nama Wali Kelas</label>
		<input type="text" id="nama_wali_kelas" class="form-control bg-light border border-danger" placeholder="Masukkan Nama Wali Kelas Anda" name="nama_wali_kelas" value="{{ old('nama_wali_kelas')	 }}"/>
		</div>
		
		
		<div class="form-group">
	    <label for="jurusan">Jurusan</label>
	    <select multiple class="form-control bg-light border border-danger" id="jurusan" name="jurusan"  >
	      <option readonly value=""> -Pilih Jurusan Anda- </option>
	      <option value="Rekayasa Perangkat lunak" 		  @if (old('jurusan') == "Rekayasa Perangkat lunak") {{ 'selected' }} @endif>Rekayasa Perangkat lunak</option>
	      <option value="Teknik Komputer Jaringan" 		  @if (old('jurusan') == "Teknik Komputer Jaringan") {{ 'selected' }} @endif>Teknik Komputer Jaringan</option>
	      <option value="Multimedia" 			   		  @if (old('jurusan') == "Multimedia") {{ 'selected' }} @endif>Multimedia</option>
	      <option value="Teknik Audio Video" 	   		  @if (old('jurusan') == "Teknik Audio Video") {{ 'selected' }} @endif>Teknik Audio Video</option>
	      <option value="Teknik Instalasi Tenaga Listrik" @if (old('jurusan') == "Teknik Instalasi Tenaga Listrik") {{ 'selected' }} @endif>Teknik Instalasi Tenaga Listrik</option>
	      <option value="Teknik Otomasi Industri" @if (old('goldar') == "Teknik Otomasi Industri") {{ 'selected' }} @endif>Teknik Otomasi Industri</option>
	    </select>
	  </div><br>

	  	<div class="btn-group ">
		<button  class="btn btn-outline-danger content center-block" value="Simpan" type="submit" >Simpan</button>
		<a href="/laravel/public/kelas" class="btn btn-outline-primary center-block">Kembali</a>
		</div>

	</form>

	
			</div>
		</div>
	</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>