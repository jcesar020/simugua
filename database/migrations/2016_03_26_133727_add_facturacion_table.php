<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacturacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturaciones', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();

            $table->Integer('periodo')->unsigned();
            $table->integer('conexion_id')->unsigned()->nullable();
            $table->foreign('conexion_id')->on('conexiones')->references('id');
            $table->integer('medidor_id')->unsigned()->nullable();
            $table->foreign('medidor_id')->on('medidores')->references('id');

            $table->smallInteger('catalogo_id')->unsigned();
            $table->foreign('catalogo_id')->on('catalogos')->references('id');

            $table->string('concepto', 50);
            $table->smallInteger('cant')->default(1);
            $table->decimal('precio');
            $table->unsignedInteger('plan_id')->nullable();
            $table->foreign('plan_id')->on('planes')->references('id');
            $table->boolean('manual');
            $table->enum('estado' , ['F', 'C', 'P', 'N'  ])->default('F');
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
        Schema::drop('facturaciones');
    }
}
