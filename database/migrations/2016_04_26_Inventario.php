<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->increments('id');
            $table->int('material_id');
            $table->int('existencia');
            $table->int('minimo');
            
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->int('level');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}


CREATE TABLE `inventario` (
		`categoria` varchar(50) DEFAULT NULL,
		`material` varchar(100) DEFAULT NULL,
		`cantidad` int(11) DEFAULT NULL,
		`minimo` int(11) DEFAULT NULL,
		`precio` float DEFAULT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
