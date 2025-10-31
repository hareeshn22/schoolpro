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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();

            // UI: Event Name
            $table->string('event_name');
            // UI: Date & time
            $table->dateTime('event_datetime')->index();
            // UI: Event Place
            $table->string('event_place')->nullable();
            // UI: Participation method (dropdown)
            // e.g., 'individual', 'team', 'online', 'offline' — adjust values as needed
            $table->string('participation_method')->nullable()->index();
            // UI: Participation category (dropdown)
            // e.g., 'junior', 'senior', 'open' — adjust values as needed
            $table->string('participation_category')->nullable()->index();
            // UI: Gender (dropdown)
            $table->enum('gender', ['male', 'female', 'mixed'])->nullable()->index();
            // UI: Official sponsor
            $table->string('official_sponsor')->nullable();
            // UI: Upload Photo
            $table->string('photo_path')->nullable();
            // UI: Last date for entries
            $table->date('last_date_for_entries')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
