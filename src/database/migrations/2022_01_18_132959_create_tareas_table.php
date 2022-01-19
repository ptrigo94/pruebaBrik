<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('desc_tarea', 45)->nullable();
            $table->dateTime('fecha_creacion')->nullable()->useCurrent();
            $table->dateTime('fecha_expiracion')->nullable();
            $table->integer('estado_tarea')->nullable()->index('tarea_estado_tarea_idx');
            $table->integer('id_usuario')->nullable()->index('tarea_usuario_idx');
            $table->dateTime('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
    }
}
