<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabang', function (Blueprint $table) {
            $table->Increments('cabang_id');
            $table->string('cabang_kode');
            $table->string('cabang_nama');
            $table->string('cabang_alamat')->nullable();
            $table->string('cabang_kota')->nullable();
            $table->string('cabang_kodepos')->nullable();
            $table->string('cabang_propinsi')->nullable();
            $table->string('cabang_keterangan')->nullable();
            $table->string('cabang_kode_aset')->nullable();
            $table->enum('cabang_aktif', ['Aktif', 'Tidak Aktif'])->default('Aktif')->nullable();
            $table->string('cabang_creator')->nullable();
            $table->date('cabang_date_create')->nullable();
            $table->string('cabang_update')->nullable();
            $table->date('cabang_date_update')->nullable();;
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
        Schema::dropIfExists('cabang');
    }
}
