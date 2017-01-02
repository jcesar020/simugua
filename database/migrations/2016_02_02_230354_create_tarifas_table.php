<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifas', function (Blueprint $table) {
            $table->increments('id');
            $table->char('tipo',2);
            $table->tinyInteger('grupo');
            $table->char('clase',1);
            $table->tinyInteger('corr')->unsigned();
            $table->smallInteger('limite');
            $table->decimal('precioMulti');
            $table->decimal('precioFijo');
            $table->string('comentario');
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
        Schema::drop('tarifas');
    }
}
