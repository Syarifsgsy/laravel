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
	<title>Form Siswa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
	<div class="container">
	<div class="row-justify-content-center">
	<div class="col-md-12 text-center">	
	<h1 align="center">Form Siswa</h1>
	<form action="{{ url('siswa') }}" method="POST">
		@csrf

		<div class="form-group">
		<label for="nis">NIS</label>
		<input type="text" id="nis" class="form-control bg-light border border-danger" placeholder="Masukkan NIS Anda" name="nis" value="{{ old('nis')	 }}"/>
		</div>

		<div class="form-group">
		<label for="nama_lengkap">Nama Lengkap</label>
		<input type="text" id="nama_lengkap" class="form-control  bg-light border border-danger" placeholder="Masukkan Nama Lengkap Anda" name="nama_lengkap"  value="{{ old('nama_lengkap')	 }}">
		</div>


		<div class="form-group">
		Jenis Kelamin	:<br>
			<label class="form-check-label"><input style="border-color: red;"  class=" form-check-input" type="radio" name="jenkel"  id="pria"  value="L" {{old('jenkel')=="L" ? 'checked=' . '"' . 'checked' . '"' : '' }} />L</label><br>

			<label form-check-label><input style="border-color: red;"  class="form-check-input"  type="radio" name="jenkel" id="wanita" value="P" {{old('jenkel')=="P" ? 'checked=' . '"' . 'checked' . '"' : '' }} />P</label><br>
		</div>
		
		
		<div class="form-group">
	    <label for="goldar">Golongan Darah</label>
	    <select multiple class="form-control bg-light border border-danger" id="goldar" name="goldar"  >
	      <option readonly value=""> -Pilih Golongan Darah Anda- </option>
	      <option value="A" @if (old('goldar') == "A") {{ 'selected' }} @endif>A</option>
	      <option value="B" @if (old('goldar') == "B") {{ 'selected' }} @endif>B</option>
	      <option value="O" @if (old('goldar') == "O") {{ 'selected' }} @endif>O</option>
	      <option value="AB" @if (old('goldar') == "AB") {{ 'selected' }} @endif>AB</option>
	    </select>
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