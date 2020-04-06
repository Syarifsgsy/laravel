<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public $table	='t_kelas';

    protected $fillable	=[
    	'nama_kelas', 'lokasi_ruangan', 'jurusan', 'nama_wali_kelas'
    ];
}
