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
            $table->string('child_price')->nullable();
            $table->string('thumbnail_URL');
            $table->string('search_keywords')->nullable();
            $table->string('description');
            $table->string('brand');
            $table->string('child_sku')->nullable();
            $table->string('color');
            $table->string('color_family');
            $table->string('color_swatches')->nullable();
            $table->string('size')->nullable();
            $table->string('shoe_size')->nullable();
            $table->string('pants_size')->nullable();
            $table->string('occassion')->nullable();
            $table->string('season')->nullable();
            $table->string('badges')->nullable();
            $table->float('rating_avg');
            $table->float('rating_count');
            $table->float('inventory_count');
        
            $table->unsignedBigInteger('category_id')->nullable();
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
