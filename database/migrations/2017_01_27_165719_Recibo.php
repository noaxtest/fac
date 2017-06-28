<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Recibo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Recibos', function (Blueprint $table) {
            $table->increments('id_recibo');
            $table->string('tipo');
            $table->string('descripcion');
            $table->date('fecha');
            $table->double('importe');
            $table->string('pagado');
            $table->integer('vecino_id')->unsigned();
            $table->foreign('vecino_id')->references('id_vecino')->on('vecino');
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
        Schema::drop('Recibos');
    }
}
