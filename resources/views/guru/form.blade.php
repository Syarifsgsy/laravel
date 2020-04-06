@if(session('error'))
<div class="alert alert-error">
	{{ session('error') }}
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger">
	<strong>Perhatian!!!</strong><br>
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
	<title>Form Guru</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
	<div class="container">
	<div class="row-justify-content-center">
	<div class="col-md-12 text-center">	
	<h1 align="center">Form Guru</h1>
	<form action="{{ url('guru', @$guru->id ) }}" method="POST">
		@csrf

		@if(!empty($guru))
			@method('PATCH')
		@endif

		<div class="form-group">
		<label for="nip">NIP</label>
		<input type="text" id="nip" class="form-control bg-light border border-danger" placeholder="Masukkan nip Anda" name="nip" value="{{ old('nip', @$guru->nip)	 }}"/>
		</div>

		<div class="form-group">
		<label for="nama_guru">Nama Guru</label>
		<input type="text" id="nama_guru" class="form-control  bg-light border border-danger" placeholder="Masukkan Nama Lengkap Anda" name="nama_guru"  value="{{ old('nama_guru', @$guru->nama_guru)	 }}">
		</div>


		<div class="form-group">
		Jenis Kelamin	:<br>
			<label class="form-check-label"><input style="border-color: red;"  class=" form-check-input" type="radio" name="jenis_kelamin"  id="pria"  value="L" {{old('jenis_kelamin', @$guru->jenis_kelamin)=="L" ? 'checked=' . '"' . 'checked' . '"' : '' }} />L</label><br>

			<label form-check-label><input style="border-color: red;"  class="form-check-input"  type="radio" name="jenis_kelamin" id="wanita" value="P" {{old('jenis_kelamin', @$guru->jenis_kelamin)=="P" ? 'checked=' . '"' . 'checked' . '"' : '' }} />P</label><br>
		</div>
		
		
		<div class="form-group">
	    <label for="alamat">Alamat</label>
	    <input type="text" id="alamat" class="form-control  bg-light border border-danger" placeholder="Masukkan Alamat Anda" name="alamat"  value="{{ old('alamat', @$guru->alamat)	 }}">
	    
	  </div><br>
		<button  class="btn btn-outline-danger" value="Simpan" type="submit">Simpan</button>
	</form>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</div>
	</div>
	</div>
</body>
</html>