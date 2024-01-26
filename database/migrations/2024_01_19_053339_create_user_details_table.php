<?php

use App\Constants\Gender;
use App\Constants\UserCategory;
use App\Constants\UserStatus;
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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->integer('course_duration')->nullable();
            $table->string('enroll_number')->nullable();
            $table->string('roll_number')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->enum('gender', array_column(Gender::cases(), 'value'))->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('category', array_column(UserCategory::cases(), 'value'))->nullable();
            $table->enum('status', array_column(UserStatus::cases(), 'value'))->nullable();
            $table->string('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('profile_image')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
