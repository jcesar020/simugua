<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacturaDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_detalle', function(Blueprint $table){
            $table->unsignedInteger('factura_id');
            $table->foreign('factura_id')->on('facturas')->references('id');
            $table->unsignedBigInteger('facturaciones_id');
            $table->foreign('facturaciones_id')->on('facturaciones')->references('id');
            $table->primary(['factura_id', 'facturaciones_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facturas_detalle');
    }
}
