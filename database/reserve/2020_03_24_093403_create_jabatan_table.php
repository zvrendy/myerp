<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatan', function (Blueprint $table) {
            $table->Increments('jabatan_id');
            $table->string('jabatan_nama');
            $table->string('jabatan_keterangan')->nullable();
            $table->enum('jabatan_aktif', ['Aktif', 'Tidak Aktif'])->default('Aktif')->nullable();
            $table->string('jabatan_creator')->nullable();
            $table->date('jabatan_date_create')->nullable();
            $table->string('jabatan_update')->nullable();
            $table->date('jabatan_date_update')->nullable();
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
        Schema::dropIfExists('jabatan');
    }
}
