<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectEnrolRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_enrol_record', function (Blueprint $table) {
            $table->id('enrol_id');
            $table->string('student_name');
            $table->string('enrol_grade');
            $table->string('enrol_year');
            $table->string('enrol_type');
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
        Schema::dropIfExists('subject_enrol_record'); 
    }
}
