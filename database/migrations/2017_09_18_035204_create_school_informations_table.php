<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school_name', 150)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 60)->nullable();
            $table->string('term', 20)->nullable();
            $table->string('session', 10)->nullable();
            $table->string('logo')->nullable();
              
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
        Schema::dropIfExists('school_informations');
    }
}
