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
        Schema::create('trainer_publications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('trainer_profile_id')->constrained('trainer_profiles')->onDelete('cascade');
            $table->string('title');
            $table->string('publication_name');
            $table->date('published_at');
            $table->text('link')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainer_publications');
    }
};
