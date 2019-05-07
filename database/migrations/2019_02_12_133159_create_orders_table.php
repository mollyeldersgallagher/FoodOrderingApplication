<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->date('received_on');
            $table->string('delivery_address',100);
            $table->string('billing_address',100);
            $table->enum('status', ['received', 'paid','shipped','cancelled']);
            $table->integer('customer_id')->unsigned();
            $table->integer('credit_card_id')->unsigned();

            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('credit_card_id')->references('id')->on('credit_cards');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
