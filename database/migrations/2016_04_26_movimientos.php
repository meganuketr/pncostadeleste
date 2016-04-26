<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->int('material_id');
            $table->int('tipo');
            $table->int('cantidad');
            $table->int('user_id');
            $table->string('motivo');
            
            $table->foreign('material_id')
	            ->references('id')
	            ->on('materiales')
	            ->onDelete('cascade');
	        $table->foreign('user_id')
	            ->references('id')
	            ->on('users')
	            ->onDelete('cascade');
	             
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
        Schema::drop('movimientos');
    }
}