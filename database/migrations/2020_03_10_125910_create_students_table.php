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
            $table->string('name');
            $table->string('fname');
            $table->string('mname');
            $table->integer('roll')->nullable();
            $table->integer('class_roll')->nullable();
            $table->integer('reg')->nullable();
            $table->text('address');
            $table->tinyInteger('class_id')->nullable();
            $table->tinyInteger('section_id')->nullable();
            $table->tinyInteger('group_id')->nullable();
            $table->string('phone');
            $table->date('admission_date');
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
