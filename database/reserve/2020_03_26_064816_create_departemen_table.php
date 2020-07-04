<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartemenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departemen', function (Blueprint $table) {
            $table->Increments('departemen_id');
            $table->string('departemen_nama');
            $table->string('departemen_keterangan');
            $table->string('departemen_kode_aset');
            $table->enum('departemen_aktif', ['Aktif', 'Tidak Aktif'])->default('Aktif')->nullable();
            $table->string('departemen_creator')->nullable();
            $table->date('departemen_date_create')->nullable();
            $table->string('departemen_update')->nullable();
            $table->date('departemen_date_update')->nullable();;
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
        Schema::dropIfExists('departemen');
    }
}
