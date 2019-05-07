<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('food_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->timestamps();

            $table->foreign('food_id')->references('id')->on('foods');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_order');
    }
}
