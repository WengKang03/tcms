<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_record', function (Blueprint $table) {
            $table->id('attendance_id');
            $table->foreignId('teacher_id');
            $table->string('attendance_subject');
            $table->string('attendance_grade');
            $table->string('attendance_year');
            $table->string('status');
            $table->string('reason');
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
        Schema::dropIfExists('attendance_record');
    }
}
