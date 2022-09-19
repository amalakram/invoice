<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_number', 50);
            $table->date('invoice_Date');
            $table->date('Due_date');
            $table->string('product', 50)->nullable();
            $table->bigInteger( 'section_id' )->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->decimal('Amount_collection',8,2)->nullable();
            $table->decimal('Amount_Commission',8,2)->nullable();
            $table->decimal('Discount',8,2)->nullable();
            $table->decimal('Value_VAT',8,2)->nullable();
            $table->string('Rate_VAT', 999)->nullable();
            $table->decimal('Total',8,2)->nullable();
            $table->string('Status', 50);
            $table->integer('Value_Status');
            $table->text('note')->nullable();
            $table->date('Payment_Date')->nullable();
            $table->string('title')->nullable();
            $table->string('client');
            $table->string('customer_email')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->string('client_address')->nullable();
            $table->string('company_name')->nullable();
            $table->decimal('sub_total',8,2)->nullable();;
            $table->string('discount_type')->nullable();
            $table->decimal('discount_value', 8, 2)->default(0.00);
            $table->decimal('net_ammount', 8, 2)->default(0.00);
            $table->decimal('vat_value', 8, 2)->default(0.00);
            //$table->decimal('shipping', 8, 2)->default(0.00);
            $table->decimal('total_due', 8, 2)->default(0.00);
            $table->softDeletes();
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
        Schema::dropIfExists('invoices');
    }
}
