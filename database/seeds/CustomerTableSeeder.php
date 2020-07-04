<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 50; $i++){
 
            // insert data ke table pegawai menggunakan Faker
          DB::table('customer')->insert([
              'ktp' => $faker->nik(),
              'npwp' => $faker->randomNumber,
              'nama' => $faker->name,
              'tipe' => $faker->numberBetween(1,4),
              'alamat' => $faker->address,
              'kontak_person' => $faker->PhoneNumber,
              'nama_dagang' => $faker->company,
              'alamat_dagang' => $faker->address,
              'telp' => $faker->PhoneNumber,
              'fax' => $faker->PhoneNumber,
              'kode_cabang' => $faker->numberBetween(1,10)
          ]);
    }
}
}