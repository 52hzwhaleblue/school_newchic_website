<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->string('id')->primary(); // từng sản phẩm khác nhauphp
            $table->string('productID');
            $table->string('SKU');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('size');
            $table->string('color');
            $table->string('image');
            $table->string('typeID');
            $table->string('providerID');
            $table->integer('status');
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
        Schema::dropIfExists('product_details');
    }
}