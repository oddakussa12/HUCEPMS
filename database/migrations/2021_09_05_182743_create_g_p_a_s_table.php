<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGPASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('g_p_a_s', function (Blueprint $table) {
            $table->integer('student_id');
            $table->float('GPA');
            $table->id();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('g_p_a_s');
    }
}
