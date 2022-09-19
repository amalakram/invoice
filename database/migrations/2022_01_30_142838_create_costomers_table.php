<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costomers', function (Blueprint $table) {
            $table->id();
            $table->string('client');
            $table->string('customer_email')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->string('client_address')->nullable();
            $table->string('company_name')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('costomers');
    }
}
