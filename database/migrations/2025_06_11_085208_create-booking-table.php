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
        Schema::create('booking', function (Blueprint $table) {
            $table->string('room_type', 15);
            $table->string('room_no', 15)->unique();
            $table->string('check_in', 20);
            $table->string('check_out', 20);
            $table->string('adult', 2);
            $table->string('children', 2);
            $table->string('first_name', 15);
            $table->string('phone_no', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
