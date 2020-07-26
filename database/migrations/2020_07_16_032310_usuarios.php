<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('usuario_id');
            $table->string('foto');
            $table->string('name');
            $table->string('apellidop');
            $table->string('apellidom');
            $table->string('genero');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('placa');
            $table->string('comentario');
            $table->unsignedInteger('marca_id');
            $table->unsignedInteger('modelo_id');
            $table->rememberToken();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('usuarios');
    }
}
