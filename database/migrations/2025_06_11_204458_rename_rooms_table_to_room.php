<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::rename('rooms', 'room');
    }

    public function down(): void
    {
        Schema::rename('room', 'rooms');
    }
};
// This migration renames the 'rooms' table to 'room'.
