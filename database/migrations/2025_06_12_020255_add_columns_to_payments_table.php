<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('payments', function (Blueprint $table) {
        $table->string('transaction_ref')->unique();
        $table->string('card_name');
        $table->string('card_last_four', 4);
        $table->unsignedTinyInteger('expiry_month');
        $table->unsignedSmallInteger('expiry_year');
    });
}

public function down()
{
    Schema::table('payments', function (Blueprint $table) {
        $table->dropColumn([
            'transaction_ref',
            'card_name',
            'card_last_four',
            'expiry_month',
            'expiry_year'
        ]);
    });
}
};
