<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReciboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recibos', function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary();
            $table->date('fecha');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->on('clientes')->references('id');
            $table->Integer('periodo')->unsigned();
            $table->integer('conexion_id')->unsigned()->nullable();
            $table->foreign('conexion_id')->on('conexiones')->references('id');
            $table->integer('medidor_id')->unsigned()->nullable();
            $table->foreign('medidor_id')->on('medidores')->references('id');

            $table->string('concepto');
            $table->enum('estado', ['N', 'I', 'C'])->default('C');
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
        Schema::drop('recibos');
    }
}