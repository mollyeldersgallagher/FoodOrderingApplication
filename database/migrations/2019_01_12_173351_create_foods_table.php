<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('description');
          $table->integer('diet_id')->unsigned();
          $table->string('allergies');
          $table->string('ingredients');
          $table->float('cost');
          $table->string('image');
          $table->timestamps();

          $table->foreign('diet_id')->references('id')->on('diets');
        //  $table->foreign('option_id')->references('id')->on('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
    }
}
