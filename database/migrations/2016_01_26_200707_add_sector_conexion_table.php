<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSectorConexionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conexiones', function (Blueprint $table) {
            $table->integer("sector_id")->unsigned();
            $table->foreign("sector_id")->references("id")->on("sectores");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conexiones', function (Blueprint $table) {
            //
        });
    }
}
