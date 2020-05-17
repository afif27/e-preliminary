<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePrelims extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prelims', function (Blueprint $table){
            $table->increments('id');
            $table->integer('aircraft_id')->unsigned()->nullable();
            $table->foreign('aircraft_id')->references('id')->on('aircrafts');
            $table->string('description');
            $table->string('finding');
            $table->string('seat_position');
            $table->string('action');
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
        Schema::dropIfExists('prelims');
    }
}
