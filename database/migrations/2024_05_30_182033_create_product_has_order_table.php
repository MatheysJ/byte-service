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
        Schema::create('product_has_order', function (Blueprint $table) {
            $table->increments("id_product_has_order");
            $table->integer("quantity");
            
            $table->integer('id_product')->unsigned();
            $table->integer('id_order')->unsigned();

            $table->foreign('id_product')->references('id_product')->on('product');
            $table->foreign('id_order')->references('id')->on('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_has_order');
    }
};
