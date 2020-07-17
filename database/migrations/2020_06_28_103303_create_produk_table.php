<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id_produk');
            $table->string('nama')->nullable();
            $table->decimal('qty', 18,4)->nullable();
            $table->decimal('hpp', 18,4)->nullable();
            $table->decimal('harga_jual', 18,4)->nullable();
            $table->string('tipe_barang')->nullable();
            $table->string('gambar')->nullable();
            $table->boolean('flag_status')->nullable();
            $table->boolean('flag_stok')->nullable();
            $table->boolean('flag_sales')->nullable();
            $table->string('user_stamp')->nullable();
            $table->timestamp('tgl_input');
            $table->timestamp('tgl_update')->nullable();
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
        Schema::dropIfExists('produk');
    }
}
