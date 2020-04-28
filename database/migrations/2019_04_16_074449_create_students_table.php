<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('roll')->nullable();
            $table->string('reg_id');
            $table->integer('department_id');
            $table->integer('classes_id');
            $table->string('father_name');
            $table->string('mother_Name');
            $table->string('presdent_address');
            $table->string('permanent_address');
            $table->string('home_number');
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
        Schema::dropIfExists('students');
    }
}
