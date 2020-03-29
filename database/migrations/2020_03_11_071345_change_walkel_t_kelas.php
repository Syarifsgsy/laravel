<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeWalkelTKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::table('t_kelas',function($table){
        $table->renameColumn('nama_wali_kelas', 'walkel');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('t_kelas',function($table){
        $table->renameColumn('walkel','nama_wali_kelas');

        });
    }
}
