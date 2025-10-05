<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('student_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            // $table->enum('role', ['player', 'substitute', 'trainer', 'referee'])->default('player');
            // $table->date('eventdate');
            $table->string('practice_time')->nullable(); 
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_participants');
    }
};
