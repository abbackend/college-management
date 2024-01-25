<?php

use App\Constants\SubjectType;
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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('result_id');
            $table->string('subject_name');
            $table->string('subject_code');
            $table->enum('subject_type', array_column(SubjectType::cases(), 'value'));
            $table->integer('theory_marks');
            $table->integer('practical_marks');
            $table->timestamps();

            $table->foreign('result_id')->references('id')->on('results');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
};
