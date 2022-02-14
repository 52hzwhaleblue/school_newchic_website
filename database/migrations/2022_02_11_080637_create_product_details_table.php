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
            $table->string('price');
            $table->string('quantity');
            $table->string('size');
            $table->string('color');
            $table->string('image');
            $table->string('typeID');
            $table->string('providerID');
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