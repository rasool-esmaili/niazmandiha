<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {

            $table->engine='InnoDB';
            $table->increments('id');
            $table->char('vehicle_brand',15)->nullable();
            $table->char('model',4)->nullable();
            $table->integer('kilometre')->nullable();
            $table->boolean('car')->nullable();
            $table->boolean('car_part')->nullable();
            $table->boolean('motor')->nullable();
            $table->boolean('boat')->nullable();
            $table->boolean('heavy_car')->nullable();

            $table->integer('post_id')->unsigned();

            $table->timestamps();

            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade') ;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
