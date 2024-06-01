<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');

            $table->timestamps();

            $table->string('address');
            $table->double('total');
            $table->double('sale_total');
            $table->string('status');
            $table->double('change');

            $table->integer('id_client')->unsigned();
            $table->integer('id_payment_method')->unsigned();

            $table->foreign('id_client')->references('id_client')->on('client');
            $table->foreign('id_payment_method')->references('id_payment_method')->on('payment_method');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
