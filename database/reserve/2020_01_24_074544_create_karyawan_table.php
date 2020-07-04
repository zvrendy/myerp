<?php

use App\Karyawan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->string('karyawan_nik')->primary();
            $table->string('karyawan_nama')->nullable();
            $table->string('karyawan_nickname')->nullable();
            $table->string('karyawan_ktp')->required();
            $table->string('karyawan_alamatktp')->required();
            $table->enum('karyawan_gender', ['L', 'P']);
            $table->enum('karyawan_agama', ['Islam', 'Kristen', 'Katholik', 'Buddha', 'Kong Hu Cu']);
            $table->enum('karyawan_pph21', ['TK', 'K']);
            $table->enum('karyawan_statuskawin', ['Kawin', 'Belum Kawin']);
            $table->integer('karyawan_jmlanak');
            $table->string('karyawan_kotalahir');
            $table->date('karyawan_tgllahir');
            $table->string('karyawan_alamat');
            $table->string('karyawan_kota');
            $table->string('karyawan_kodepos');
            $table->string('karyawan_email');
            $table->string('karyawan_telepon')->nullable();
            $table->string('karyawan_npwp')->nullable();
            $table->integer('cabang_id');
            $table->integer('jabatan_id');
            $table->integer('departemen_id');
            // $table->integer('karyawan_level');
            $table->string('karyawan_bpjskes')->nullable();
            $table->string('karyawan_bpjsket')->nullable();
            $table->enum('karyawan_aktif', ['aktif', 'tidak aktif']);
            $table->string('karyawan_foto')->nullable();
            $table->string('karyawan_creator')->nullable();
            $table->date('karyawan_date_create')->nullable();
            $table->string('karyawan_update')->nullable();
            $table->date('karyawan_date_update')->nullable();
            $table->timestamps();
        });

        // Karyawan::create([
        //     'karyawan_nik' => '0000001',
        //     'karyawan_nama' => 'Super Administrator',
        //     'karyawan_nickname'=> 'super',
        //     'karyawan_ktp'=> 1111222233334444,
        //     'karyawan_alamatktp'=> 'Diatas bumi dibawah langit',
        //     'karyawan_gender' => 'L',
        //     'karyawan_agama' =>
        //     'karyawan_pph21', ['TK', 'K'];
        //     'karyawan_statuskawin', ['Kawin', 'Belum Kawin'];
        //     'karyawan_jmlanak';
        //     'karyawan_kotalahir';
        //     'karyawan_tgllahir';
        //     'karyawan_alamat';
        //     'karyawan_kota';
        //     'karyawan_kodepos';
        //     'karyawan_email';
        //     'karyawan_telepon'=> nullable(;
        //     'karyawan_npwp'=> nullable(;
        //     'karyawan_cabang';
        //     'karyawan_jabatan';
        //     'karyawan_departemen';
        //     'karyawan_level';
        //     'karyawan_bpjskes'=> nullable(;
        //     'karyawan_bpjsket'=> nullable(;
        //     'karyawan_aktif', ['aktif', 'tidak aktif'];
        //     'karyawan_foto'=> nullable(;
        //     'karyawan_creator'=> nullable(;
        //     'karyawan_date_create'=> nullable(;
        //     'karyawan_update'=> nullable(;
        //     'karyawan_date_update'=> nullable(;

        // ]);
        // INSERT INTO `karyawan` VALUES ('000001', 'Super Administrator', 'super', '1111222233334444', 'Diatas bumi dibawah langit', 'L', 'Islam', 'TK', 'Belum Kawin', 0, 'Rambakrejo', '1988-08-08', 'Diatas bumi dibawah langit', 'Rambakrejo', '112233', 'super@admin.com', '0315921534', '111112222233333', 21, 11, 10, 1, '0000124212', '000112233', 'aktif', 'satu', 'saya', '2020-02-20', '2020-02-20', '2020-02-20', '2020-02-20 11:21:18', '2020-02-20 11:21:19');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}
