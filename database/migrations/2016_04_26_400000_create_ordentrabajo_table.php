<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdentrabajoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordentrabajo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();          
            $table->string('descripcion');
            $table->integer('user_id')->unsigned();
            $table->integer('status_id');
            $table->date('fecha_ofrecida');
            $table->date('fecha_terminada');
//            $table->string('pago');
            
            $table->foreign('cliente_id')
	            ->references('id')
	            ->on('clientes')
	            ->onDelete('cascade');
            $table->foreign('status_id')
	            ->references('id')
	            ->on('status')
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
        Schema::drop('ordentrabajo');
    }
}
