<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectTeacherTable extends Migration
{
    
    public function up()
    {
        Schema::create('subject_teacher', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_id');
            $table->integer('teacher_id');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('subject_teacher');
    }
}
