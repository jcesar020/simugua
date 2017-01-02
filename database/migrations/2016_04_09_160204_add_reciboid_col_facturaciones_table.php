<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReciboidColFacturacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facturaciones', function(Blueprint $table){
           $table->unsignedInteger('recibo_id')->nullable();
           $table->foreign('recibo_id')->on('recibos')->references('id');
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
           $table->dropColumn('recibo_id');
        });
    }
}
