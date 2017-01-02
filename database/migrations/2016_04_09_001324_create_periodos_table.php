<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos', function(Blueprint $table){
            $table->unsignedInteger('periodo');
            $table->integer("sector_id")->unsigned();
            $table->date('fecha_vencimiento');
            $table->enum('estado', ['G', 'F', 'C'])->default('G');
            $table->foreign("sector_id")->references("id")->on("sectores");
            $table->timestamps();
            $table->primary(['periodo', 'sector_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('periodos');
    }
}
