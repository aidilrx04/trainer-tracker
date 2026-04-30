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
        Schema::create('recent_training_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_profile_id')->constrained('trainer_profiles')->onDelete('cascade');

            $table->string('program_name');
            $table->string('client');
            $table->string('date_string');
            $table->integer('participant_count')->nullable();
            $table->string('duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recent_training_programs');
    }
};
