<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArPesananDtlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ar_pesanan_dtl', function (Blueprint $table) {
<<<<<<< HEAD
            $table->bigIncrements('id_sp_d');
            $table->string('kode_trans');
            $table->string('kd_unit');
            $table->string('no_dok');
            $table->string('id_produk');
            $table->decimal('qty', 18, 4)->nullable();
            $table->decimal('dpp', 18, 4)->nullable();
            $table->decimal('ppn', 18, 4)->nullable();
            $table->decimal('pph', 18, 4)->nullable();
            $table->decimal('total', 18, 4)->nullable();
            $table->decimal('harga_jual', 18, 4)->nullable();
            $table->boolean('flag_status')->default(1);
            $table->string('user_stamp')->nullable();
            $table->timestamp('tgl_input');
            $table->timestamp('tgl_update')->nullable();
=======
            $table->bigIncrements('id');
            $table->timestamps();
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ar_pesanan_dtl');
    }
}
