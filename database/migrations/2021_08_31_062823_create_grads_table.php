<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradsTable extends Migration
{
    public function up()
    {
        Schema::create('grads', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_id');
            $table->integer('student_id');
            $table->char('grade',1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grads');
    }
}
