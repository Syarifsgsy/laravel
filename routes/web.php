<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {	
	// $nama	="Syarif";
	// $Jenkel	= "Laki-Laki";
    // return view('belajar', compact('nama','Jenkel'));
	return view('welcome');
});



Route::get('/siswa', 'SiswaController@index');
Route::get('/siswa/create', 'SiswaController@create');
Route::post('/siswa', 'SiswaController@store');

// Route::get('/belajar', 'SiswaController@index');
Route::get('/kelas', 'KelasController@index');
Route::get('/kelas/create', 'KelasController@create');
Route::post('/kelas', 'KelasController@store');

// Route::get('/belajar', function() {
	
// 	// echo "Belajar PHP, Tulisan ini ditampilkan dari routes";
// });



Route::get('hai',function() {
	return "Hai, selamat datang di web aing";
});




Route::get('/rute1', 'SiswaController@index1');

Route::get('/rute2', 'SiswaController@index2');

Route::get('/rute3', 'SiswaController@index3');

