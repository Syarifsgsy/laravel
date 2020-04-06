<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //isi perintah nya
        $faker		= Faker::create('id_ID');

        for($i =1; $i <= 15; $i++){
        DB::table('t_guru')->insert([
        	'nip'			=> $faker->randomNumber($nbDigits = NULL, $strict = false),
        	'nama_guru'		=> $faker->name,
        	'jenis_kelamin'	=> $faker->randomLetter,
        	'alamat'		=> $faker->address

        ]);

    }
    }
}
