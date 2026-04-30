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
        Schema::create('trainer_educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_profile_id')->constrained('trainer_profiles')->onDelete('cascade');

            $table->string('degree_name');
            $table->string('institution_name');
            $table->string('completion_year');
            $table->string('location');
            $table->string('grade')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainer_educations');
    }
};
