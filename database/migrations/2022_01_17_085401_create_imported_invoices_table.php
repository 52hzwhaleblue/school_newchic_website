<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportedInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imported_invoices', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('employeeID');
            $table->string('providerID');
            $table->integer('totalPrice');
            $table->integer('totalQuantity');
            $table->dateTime('importedDate');
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
        Schema::dropIfExists('imported_invoices');
    }
}