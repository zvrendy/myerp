<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\CompositeKey;

class CreateUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit', function (Blueprint $table) {
            $table->primary(['id_unit', 'kd_unit']);
            $table->unsignedInteger('id_unit');
            $table->unsignedInteger('kd_unit');
            $table->text('keterangan')->nullable();
            $table->decimal('hpp', 18,4)->nullable();
            $table->decimal('harga_jual', 18,4)->nullable();
            $table->string('gambar')->nullable();
            $table->boolean('flag_status')->nullable();
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
        Schema::dropIfExists('unit');
    }
}
