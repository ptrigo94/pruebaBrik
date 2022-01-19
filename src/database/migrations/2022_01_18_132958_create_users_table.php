<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 45)->nullable();
            $table->string('email', 45)->nullable()->unique('email_UNIQUE');
            $table->string('password', 350)->nullable();
            $table->string('rememberToken')->nullable();
            $table->dateTime('timestamps')->nullable();
            $table->string('apellido', 45)->nullable();
            $table->string('rut', 12)->unique('rut_UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
