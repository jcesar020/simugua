<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConexionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conexiones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('correlativo');



            $table->integer('medidor_id')->nullable()->unsigned()->nullable();
            $table->foreign('medidor_id')->references('id')->on('medidores');

            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->integer('zona_id')->unsigned();
            $table->foreign('zona_id')->references('id')->on('zonas');

            $table->enum('tipoCon',['R', 'I', 'C']);
            $table->enum('estadoCon', ['A', 'I', 'S'])->default('I');
            $table->string('direccion');
            $table->string('observacion');
            $table->date('fechaInstalacion');
            $table->date('fechaBaja');

            $table->date('fechaInicio');
            $table->boolean('cEscritura');
            $table->boolean('cDui');
            $table->boolean('cNit');
            $table->boolean('cSalud');

            $table->timestamps();
            $table->softDeletes();






        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('conexiones');
    }
}
