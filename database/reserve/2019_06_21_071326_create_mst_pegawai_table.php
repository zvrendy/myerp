<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_pegawai', function (Blueprint $table) {
            $table->string('nik')->primary();
            $table->string('nama');
            $table->string('kota_lahir');
            $table->date('tgl_lahir');
            $table->enum('gender',['p','w']);
            $table->enum('status_kawin',['bk','k','ch','cm']);
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('no_ktp');
            $table->string('npwp')->nullable();
            $table->string('foto')->nullable();
            $table->integer('kd_agama');
            $table->string('kd_dept');
            $table->string('kd_cc');
            $table->string('kd_jabatan');
            $table->string('kd_cabang');
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
        Schema::dropIfExists('mst_pegawai');
    }
}
