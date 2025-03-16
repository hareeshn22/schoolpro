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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('student_id')->nullable()->constrained()->onUpdate('SET NULL')->onDelete('SET NULL');
            $table->foreignId('teacher_id')->nullable()->constrained()->onUpdate('SET NULL')->onDelete('SET NULL');
            $table->enum('user_type', ['student', 'teacher']);
            $table->date('leavedate');
            $table->text('reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
