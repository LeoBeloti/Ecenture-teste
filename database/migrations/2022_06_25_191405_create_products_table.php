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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('sku');
            $table->string('name');
            $table->string('product_URL');
            $table->float('price');
            $table->float('retail_price');
            $table->string('thumbnail_URL');
            $table->string('search_keywords');
            $table->string('description');
            $table->string('brand');
            $table->string('child_sku');
            $table->string('child_price');
            $table->string('color');
            $table->string('color_family');
            $table->string('color_swatches');
            $table->string('size');
            $table->string('shoe_size');
            $table->string('pants_size');
            $table->string('occasion');
            $table->string('season');
            $table->string('bagdes');
            $table->float('rating_avg');
            $table->float('rating_count');
            $table->float('inventory_count');
        
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('users');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
