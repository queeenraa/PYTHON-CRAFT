<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id'); // unsigned untuk kunci asing
            $table->unsignedBigInteger('courses_id');
            $table->unsignedBigInteger('quiz_id');
            $table->string('status', 50)->nullable(false); // nullable(false) untuk NOT NULL
            $table->primary(['user_id', 'courses_id', 'quiz_id']);
            
            // Kunci asing ke tabel users
            $table->foreign('user_id')->references('user_id')->on('users');
            
            // Kunci asing ke tabel courses
            $table->foreign('courses_id')->references('course_id')->on('courses');
            
            // Kunci asing ke tabel quizzes
            $table->foreign('quiz_id')->references('id')->on('quizzes');
            
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
        Schema::dropIfExists('progress');
    }
}

