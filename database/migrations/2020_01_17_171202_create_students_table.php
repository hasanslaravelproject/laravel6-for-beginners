<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            
             $table->string('first_name');
             $table->string('middle_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('date_of_birth');
            $table->string('place_of_birth');
            $table->string('age');
             $table->string('gender');
             $table->string('year');
            $table->integer('status')->default(1);
            $table->string('guardian');
            $table->string('relation');
            $table->string('g_address');
            $table->string('contact');
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
