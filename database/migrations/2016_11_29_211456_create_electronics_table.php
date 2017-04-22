<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectronicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electronics', function (Blueprint $table) {
            $table->engine='InnoDB';

            $table->increments('id');
            $table->char('brand',15)->nullable();
            $table->boolean('computer')->nullable();
            $table->boolean('mobile')->nullable();
            $table->boolean('multimedia')->nullable();
            $table->boolean('consol')->nullable();
            $table->boolean('phone')->nullable();
            $table->boolean('simcart')->nullable();

            $table->integer('Post_id')->unsigned();
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
        Schema::dropIfExists('electronics');
    }
}
