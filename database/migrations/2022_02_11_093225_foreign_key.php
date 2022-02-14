<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vouchers', function (Blueprint $table) {
            $table->foreign('productID')->references('id')->on('products');
            $table->foreign('employeeID')->references('id')->on('employees');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->foreign('productID')->references('id')->on('products');
            $table->foreign('userID')->references('id')->on('users');
        });
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('employeeID')->references('id')->on('employees');
            $table->foreign('userID')->references('id')->on('users');
        });
        Schema::table('invoice_details', function (Blueprint $table) {
            $table->foreign('productID')->references('id')->on('products');
            $table->foreign('invoiceID')->references('id')->on('invoices');
        });
        // Schema::table('imported_invoices', function (Blueprint $table) {
        //     $table->foreign('employeeID')->references('id')->on('employees');
        // });
        // Schema::table('imported_invoice_details', function (Blueprint $table) {
        //     $table->foreign('importedInvoiceID')->references('id')->on('imported_invoices');
        // });
        

        Schema::table('product_details', function (Blueprint $table) {
            $table->foreign('typeID')->references('id')->on('product_types');
            $table->foreign('providerID')->references('id')->on('providers');
            $table->foreign('productID')->references('id')->on('products');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}