<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username', 50)->unique();
            $table->string('email', 100)->unique();
            $table->text('address')->nullable();
            $table->string('sex', 20)->nullable();
            $table->string('phone', 20)->nullable();
            $table->integer('class_id')->nullabe();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->rememberToken();   
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
        Schema::dropIfExists('teachers');
    }
}
