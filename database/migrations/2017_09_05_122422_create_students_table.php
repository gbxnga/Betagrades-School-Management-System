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
            $table->increments('id');
            $table->string('admission_no', 100)->nullable();
            $table->string('admission_date', 100)->nullable();
            $table->string('student_type', 20)->nullable();
            $table->integer('class_id')->nullable();
            $table->string('firstname', 100)->nullable();
            $table->string('lastname', 100)->nullable();
            $table->string('image', 100)->nullable();
            $table->string('mobileno', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('religion', 100)->nullable();
            $table->string('gender', 100)->nullable();
            $table->string('date_of_birth', 100)->nullable();
            $table->text('current_address')->nullable();
            $table->string('category_id', 100)->nullable();
            $table->string('guardian_is', 100)->nullable();
            $table->string('father_name', 100)->nullable();
            $table->string('father_phone', 100)->nullable();
            $table->string('father_occupation', 100)->nullable();
            $table->string('mother_name', 100)->nullable();
            $table->string('mother_phone', 100)->nullable();
            $table->string('mother_occupation', 100)->nullable();
            $table->string('guardian_name', 100)->nullable();
            $table->string('guardian_relation', 100)->nullable();
            $table->string('guardian_phone', 100)->nullable();
            $table->string('guardian_occupation', 100)->nullable();
            $table->text('guardian_address')->nullable();
            $table->string('is_active', 255)->nullable();
            //$table->string('slug')->nullable()->nullable()->nullable();
            //$table->tinyInteger('status')->nullable()->default(1)->nullable();
            
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
