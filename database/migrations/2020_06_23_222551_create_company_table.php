<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->bigIncrements('company_id');
            $table->string('company_kode');
            $table->string('company_nama');
            $table->string('company_alamat')->nullable();
            $table->string('company_kota')->nullable();
            $table->string('company_kodepos')->nullable();
            $table->string('company_propinsi')->nullable();
            $table->string('company_keterangan')->nullable();
            $table->string('company_kode_aset')->nullable();
            $table->enum('company_aktif', ['Aktif', 'Tidak Aktif'])->default('Aktif')->nullable();
            $table->string('company_creator')->nullable();
            $table->date('company_date_create')->nullable();
            $table->string('company_update')->nullable();
            $table->date('company_date_update')->nullable();;
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
        Schema::dropIfExists('company');
    }
}
