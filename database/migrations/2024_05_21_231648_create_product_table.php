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
        Schema::create('product_category', function (Blueprint $table) {
            $table->increments('category_id');
            $table->string('name');
            $table->tinyInteger('internal');
            $table->tinyInteger('active');
        });

        Schema::create('product', function (Blueprint $table) {
            $table->increments('id_product');
            $table->string('name');
            $table->double('price');
            $table->double('sale_price');
            $table->string('image');
            $table->string('description');
            $table->tinyInteger('active');
            $table->string('tag');
            $table->integer('rank');

            $table->integer('category_id')->unsigned();

            $table->foreign('category_id')->references('category_id')->on('product_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
        Schema::dropIfExists('product_category');
    }
};
