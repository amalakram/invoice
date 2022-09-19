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
                $table->id();
                $table->string('Product_name', 999);
                $table->text('description')->nullable();
                $table->unsignedBigInteger('section_id')->nullable();
                $table->unsignedBigInteger('invoice_id')->nullable();
                $table->unsignedBigInteger('quote_id')->nullable();
                $table->string('qategory', 999)->nullable();
                $table->integer('qty')->nullable();
                $table->string('unit')->nullable();
                $table->decimal('unit_price', 8,2)->default(0.00)->nullable();
                $table->decimal('row_sub_total', 8,2)->default(0.00)->nullable();
                $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
                $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
                $table->foreign('quote_id')->references('id')->on('quotations')->onDelete('cascade');
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
}
