<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'teacher_id')
                ->nullable()
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('title')->default('');
            $table->text('desc')->nullable();
            $table->string('cover_img')->nullable();
            $table->boolean('published')->default(false);
            $table->json('tags')->nullable();
            $table->integer('video_count')->default(0);
            $table->integer('save_count')->default(0);
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
        Schema::dropIfExists('courses');
    }
}
