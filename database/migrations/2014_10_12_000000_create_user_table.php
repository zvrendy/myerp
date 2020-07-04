<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('password');
            $table->string('name');
            $table->string('email')->unique();
            $table->dateTime('user_log')->nullable();
            $table->boolean('is_admin')->default('0');
            $table->rememberToken()->nullable();
            $table->timestamps();
        });

        User::create([

            'username' => 'madfento',
            'password' => Hash::make('secret'),
            'name' => 'Endy Mooduto',
            'email' => 'madfento@admin.com',
            'user_log' => now(),
            'created_at' => now(),
            'updated_at' => now()

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
