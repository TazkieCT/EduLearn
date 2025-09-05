<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quizzes', function(Blueprint $table){
            $table->id();
            $table->foreignId('lesson_id')->nullable()->constrained('course_lessons')->nullOnDelete();
            $table->foreignId('section_id')->nullable()->constrained('course_sections')->nullOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type',['quiz','exam','final_test']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
