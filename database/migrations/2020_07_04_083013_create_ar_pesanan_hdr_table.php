<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArPesananHdrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ar_pesanan_hdr', function (Blueprint $table) {
            $table->bigIncrements('id_sp_h');
            $table->string('no_dok');
            $table->string('id_cust');
            $table->date('tgl_dok');
            $table->decimal('tot_amt', 18, 4)->nullable();
            $table->boolean('flag_status')->default(1);
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
        Schema::dropIfExists('ar_pesanan_hdr');
    }
}
