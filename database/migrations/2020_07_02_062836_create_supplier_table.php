<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->bigIncrements('id_supp');
            $table->string('ktp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('nama')->nullable();
            $table->string('tipe')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kontak_person')->nullable();
            $table->string('telp')->nullable();
            $table->string('fax')->nullable();
            $table->string('kode_cabang')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier');
    }
}
