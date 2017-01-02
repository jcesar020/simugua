<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturas', function (Blueprint $table) {
            $table->Integer('periodo')->unsigned();

            $table->integer('conexion_id')->unsigned();
            $table->foreign('conexion_id')->on('conexiones')->references('id');

            $table->integer('medidor_id')->unsigned();
            $table->foreign('medidor_id')->on('medidores')->references('id');

            $table->primary(['periodo', 'conexion_id', 'medidor_id']);

            $table->date('fechaIni');
            $table->date('fechaFin')->nullable();
            $table->integer('lecturaIni');
            $table->integer('lecturaFin')->nullable();
            $table->enum('estado',['P','I','O','V','A','F'])->default('P');
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
        Schema::drop('lecturas');
    }
}
