<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->bigInteger( 'Employee_id' )->unsigned();
            $table->foreign('Employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->string('attendance', 50);
            $table->time('time_in')->useCurrent()->nullable();;
            $table->time('time_out')->useCurrent()->nullable();;
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
        Schema::dropIfExists('attendances');
    }
}
