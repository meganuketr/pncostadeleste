<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOTsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_trabajo', function (Blueprint $table) {
            $table->increments('id');
            $table->int('cliente_id');           
            $table->string('descripcion');
            $table->int('user_id');
            $table->int('status_id');
            $table->date('fecha_ofrecida');
            $table->date('fecha_terminada');
//            $table->string('pago');
            
            $table->foreign('cliente_id')
	            ->references('id')
	            ->on('clients')
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
        Schema::drop('orden_trabajo');
    }
}
