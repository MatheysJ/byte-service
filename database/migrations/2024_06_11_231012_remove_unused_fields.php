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
        Schema::table('product', function (Blueprint $table) {
            if (Schema::hasColumns('product', ['sale_price', 'active', 'tag'])) {
                $table->dropColumn(['sale_price', 'active', 'tag']);
            }
        });
        Schema::table('product_category', function (Blueprint $table) {
            if (Schema::hasColumns('product_category', ['internal'])) {
                $table->dropColumn(['internal']);
            }
        });

        Schema::table('order', function (Blueprint $table) {
            
            if (Schema::hasColumns('order', ['change'])) {
                $table->dropColumn(['change']);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->tinyInteger('active');
            $table->double('sale_price');
            $table->string('tag');
        });

        Schema::table('product_category', function (Blueprint $table) {
            $table->tinyInteger('internal');
        });

        Schema::table('order', function (Blueprint $table) {
            $table->double('change');
        });

    }
};
