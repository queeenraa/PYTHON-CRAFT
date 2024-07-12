<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id('lesson_id');
            $table->unsignedBigInteger('course_id');
            $table->string('lesson_name');
            $table->string('image_path')->nullable();
            $table->text('content');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade');
            $table->foreign('created_by')->references('user_id')->on('users')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
