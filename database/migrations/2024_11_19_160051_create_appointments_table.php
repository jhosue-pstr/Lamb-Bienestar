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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users');
            $table->string('type');
            $table->dateTime('scheduled_date');
            $table->time('duration');
            $table->string('staff_name')->nullable();
            $table->string('area')->nullable();
            $table->string('location')->nullable();
            $table->text('reason')->nullable();
            $table->string('initiative')->nullable();
            $table->string('next_appointment')->nullable();
            $table->enum('status', ['pending', 'attended', 'missed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
