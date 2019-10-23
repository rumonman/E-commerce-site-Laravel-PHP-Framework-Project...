<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->integer('category_id');
            $table->text('product_description');
            $table->string('product_code');
            $table->integer('product_price');
            $table->integer('product_quentity');
            $table->string('product_image')->default('defaultproductphoto.jpg');
            $table->string('product_left_image')->default('defaultproductleftphoto.jpg');
            $table->string('product_right_image')->default('defaultproductrightphoto.jpg');
            $table->string('product_up_image')->default('defaultproductupphoto.jpg');
            $table->string('product_down_image')->default('defaultproductdownphoto.jpg');
            $table->timestamps();
            $table->softDeletes();
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
}
