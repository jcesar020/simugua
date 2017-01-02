<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedidoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medidores', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->primary('id');
            $table->string('marca', 10);
            $table->integer('diametro_id')->unsigned();
            $table->integer('lectura')->default(0);
            $table->date('baja')->nullable();
            $table->string('comentario');

            $table->timestamps();
            $table->foreign('diametro_id')
                ->references('id')
                ->on('diametros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medidores');
    }
}
