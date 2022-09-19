<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotitionAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotition_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('file_name', 999);
            $table->string('quotition_number', 50);
            $table->string('Created_by', 999);
            $table->unsignedBigInteger('quote_id')->nullable();
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
        Schema::dropIfExists('quotition_attachments');
    }
}
