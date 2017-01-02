<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->date('fecha');

            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->on('clientes')->references('id');

            $table->integer('conexion_id')->unsigned()->nullable();
            $table->foreign('conexion_id')->on('conexiones')->references('id');

            $table->string('concepto');
            $table->decimal('cuotaValor');
            $table->smallInteger('cuotaCan');
            $table->smallInteger('cuotaGen');
            $table->integer('periodoinicio')->unsigned();
            $table->boolean('activa')->default('1');
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
        Schema::drop('planes');
    }
}
