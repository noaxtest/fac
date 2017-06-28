<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vecino extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Vecinos', function (Blueprint $table) {
            $table->increments('id_vecino');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('correo');
            $table->string('telefono');
            $table->string('foto');
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
        Schema::drop('Vecinos');
    }
}
