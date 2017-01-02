<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGrupotarifaidColConexionesTable extends Migration
{
    public function up()
    {
        Schema::table('conexiones', function(Blueprint $table){
            $table->tinyInteger('gtarifa_id');
            $table->foreign('gtarifa_id')->references('id')->on('grupotarifas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conexiones', function(Blueprint $table){
            $table->dropColumn('gtarifa_id');
        });
    }
}
