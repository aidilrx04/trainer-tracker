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
        Schema::create('tag_trainer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_profile_id')->constrained('trainer_profiles')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tag_trainer')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_trainer');
    }
};
