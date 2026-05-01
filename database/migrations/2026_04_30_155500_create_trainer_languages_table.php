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
        Schema::create('trainer_languages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_profile_id')->constrained('trainer_profiles')->onDelete('cascade');

            $table->string('language');
            $table->enum('proficiency', [
                'Native',
                'Fluent',
                'Professional Working Proficiency',
                'Conversational',
                'Basic'
            ]);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainer_languages');
    }
};
