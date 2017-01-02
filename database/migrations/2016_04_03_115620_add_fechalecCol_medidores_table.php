<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFechalecColMedidoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medidores', function(Blueprint $table){
            $table->date('fechaLectura');
        });
    }

    public function down()
    {
        Schema::table('medidores', function(Blueprint $table){
           $table->dropColumn('fechaLectura');
        });
    }
}
