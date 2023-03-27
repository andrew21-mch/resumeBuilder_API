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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('school');
            $table->string('degree');
            $table->string('field_of_study');
            $table->string('start_date');
            $table->string('end_date')->nullable();
            $table->string('grade')->nullable();
            $table->text('activities')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('resume_id')->constrained('resumes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};
