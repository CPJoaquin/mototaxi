<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('moto_id')->nullable();
            $table->unsignedBigInteger('location_id')->unique()->nullable();
            $table->bigInteger('map_id')->unique()->nullable();
            $table->string('state', 10);
            $table->date('date');       
            $table->time('time')->nullable();     
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('users');
            $table->foreign('driver_id')->references('id')->on('users');
            $table->foreign('moto_id')->references('id')->on('motos');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('map_id')->references('id')->on('maps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travels');
    }
}
