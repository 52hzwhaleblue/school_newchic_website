<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportedInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imported_invoice_details', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('importedInvoiceID');
            $table->string('productID');
            $table->string('productName');
            $table->integer('quantity');
            $table->integer('price');
            $table->string('unit');
            $table->string('image');
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
        Schema::dropIfExists('imported_invoice_details');
    }
}
