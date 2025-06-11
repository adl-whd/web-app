<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('room', function (Blueprint $table) {
            $table->id();
            $table->string('room_number')->unique();
            $table->string('bed_type');
            $table->string('floor');
            $table->text('facility');
            $table->enum('status', ['Available', 'Booked', 'Reserved', 'Waitlist', 'Blocked']);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('room');
    }
};

