<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_record', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('student_name');
            $table->string('student_phone');
            $table->string('student_email');
            $table->string('student_grade')->nullable();
            $table->string('student_year')->nullable();
            $table->string('student_gender')->nullable();
            $table->string('student_photo')->nullable();
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
        Schema::dropIfExists('student_record');
    }
}
