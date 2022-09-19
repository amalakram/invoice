<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('quote_number', 50);
            $table->date('quote_Date')->nullable();
            $table->string('title')->nullable();
            $table->string('client');
            $table->string('customer_email')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->string('client_address')->nullable();
            $table->string('company_name')->nullable();
            $table->bigInteger( 'section_id' )->unsigned()->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->decimal('sub_total',8,2)->nullable();;
            $table->string('discount_type')->nullable();
            $table->decimal('discount_value', 8, 2)->default(0.00);
            $table->decimal('net_ammount', 8, 2)->default(0.00);

            $table->decimal('vat_value', 8, 2)->default(0.00);
            //$table->decimal('shipping', 8, 2)->default(0.00);
            $table->decimal('total_due', 8, 2)->default(0.00);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('quotations');
    }
}
