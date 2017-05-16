<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->string('city');
            $table->string('year');
            $table->string('car_make');
            $table->string('car_model');
            $table->string('car_version');
            $table->string('registration_city');
            $table->string('mileage');
            $table->string('exterior_color');
            $table->text('description');
            $table->string('price');
            $table->string('seller_name');
            $table->string('mobile_number');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
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
        Schema::dropIfExists('ads');
    }
}
