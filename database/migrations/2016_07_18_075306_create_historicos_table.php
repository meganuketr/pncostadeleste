<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();          
            $table->integer('ordentrabajo_id')->unsigned();          
  			$table->enum('operacion', ['Created', 'Cambio Status']);
            $table->integer('status_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('user_id')
	            ->references('id')
	            ->on('users')
	            ->onDelete('cascade');
            $table->foreign('ordentrabajo_id')
	            ->references('id')
	            ->on('ordentrabajo')
	            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('historicos');
    }
}
