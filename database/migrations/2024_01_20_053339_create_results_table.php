<?php

use App\Constants\CourseType;
use App\Constants\ResultStatus;
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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('course_name');
            $table->string('course_code');
            $table->integer('course_duration');
            $table->enum('course_duration_type', array_column(CourseType::cases(), 'value'));
            $table->enum('status', array_column(ResultStatus::cases(), 'value'));
            $table->boolean('is_published');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
