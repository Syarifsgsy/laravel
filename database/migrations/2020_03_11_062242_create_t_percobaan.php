<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPercobaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_percobaan', function (Blueprint $table) {
            $table->increments('id_siswa');
            $table->char('NIS',10);
            $table->string('nama_siswa',100);
            $table->date('waktu ujian');
            $table->double('nilai',8,2);
            $table->enum('status',['lulus','tidak lulus']);
            $table->integer('jumlah_siswa');
            $table->year('tahunlahir');
            $table->tinyInteger('jumlahnya');
            $table->point('posisi');
            $table->longText('deskripsi_siswa');
            $table->dateTime('tgl_lulus');
            $table->binary('data');
            $table->ipAddress('alamat_ip');
            $table->geometry('positions');

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_percobaan');
    }
}
