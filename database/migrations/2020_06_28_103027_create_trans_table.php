<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans', function (Blueprint $table) {
            $table->bigIncrements('id_trans');
            $table->string('kode_trans')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('akun_debet')->nullable();
            $table->string('akun_kredit')->nullable();
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
        Schema::dropIfExists('trans');
    }
}
