<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilitiesTable extends Migration
{
    public function up()
{
    Schema::create('facilities', function (Blueprint $table) {
        $table->id();
        $table->string('room_number');
        $table->boolean('prayer_room')->default(false);
        $table->boolean('halal_dining')->default(false);
        $table->boolean('family_friendly')->default(false);
        $table->boolean('status')->default(true);  // Active or Inactive
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('facilities');
    }
}
