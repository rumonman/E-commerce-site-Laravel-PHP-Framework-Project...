<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFutureproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('futureproducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->text('product_description');
            $table->string('product_code');
            $table->integer('product_quentity');
            $table->string('product_image')->default('defaultfutureproduct.jpg');
            $table->string('product_left_image')->default('defaultfutureleft.jpg');
            $table->string('product_right_image')->default('defaultfutureright.jpg');
            $table->string('product_up_image')->default('defaultfutureup.jpg');
            $table->string('product_down_image')->default('defaultfuturedown.jpg');
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
        Schema::dropIfExists('futureproducts');
    }
}
