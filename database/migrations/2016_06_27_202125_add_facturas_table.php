<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function(Blueprint $table){
            $table->increments('id');
            $table->Integer('periodo')->unsigned();
            $table->integer('conexion_id')->unsigned()->nullable();
            $table->foreign('conexion_id')->on('conexiones')->references('id');
            $table->integer('medidor_id')->unsigned()->nullable();
            $table->foreign('medidor_id')->on('medidores')->references('id');
            $table->string('concepto');
            $table->dateTime('fecha_vencimiento');
            $table->dateTime('fecha_pago');

            $table->enum('estado',['F', 'P', 'N', 'V']);

            $table->timestamps();
        });

        Schema::table('facturaciones', function(Blueprint $table){
            $table->unsignedInteger('factura_id')->nullable();
            $table->foreign('factura_id')->on('facturas')->references('id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facturaciones', function(Blueprint $table){
            $table->dropColumn('factura_id');
        });

        Schema::drop('facturas');
    }
}