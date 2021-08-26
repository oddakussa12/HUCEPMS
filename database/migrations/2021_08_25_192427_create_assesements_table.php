<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssesementsTable extends Migration
{
    
    public function up()
    {
        Schema::create('assesements', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('subject_id');
            $table->integer('testOne')->nullable();
            $table->integer('testTwo')->nullable();
            $table->integer('assignOne')->nullable();
            $table->integer('assignTwo')->nullable();
            $table->integer('finalExam')->nullable();
            $table->integer('total')->nullable();
            $table->integer('grade')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assesements');
    }
}
