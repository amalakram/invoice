<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->bigInteger( 'Employee_id' )->unsigned();
            $table->foreign('Employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->bigInteger( 'Overtime_id' )->unsigned()->default(0)->nullable();
            $table->foreign('Overtime_id')->references('id')->on('overtimes')->onDelete('cascade');
            $table->integer('Deductions');
            $table->integer('Cash_Advance');
            $table->integer('Net_Pay')->nullable();
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
        Schema::dropIfExists('payrolls');
    }
}
