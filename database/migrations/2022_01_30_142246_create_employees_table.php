<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Employee_ID', 50);
            $table->string('Employee_Name');
            $table->string('Employee_Mobile')->nullable();
            $table->string('Employee_Position')->nullable();
            $table->date('Member_Since')->nullable();
            $table->string('file_path')->nullable();
            $table->decimal('Salary', 8, 2)->default(00.00);
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
        Schema::dropIfExists('employees');
    }
}
