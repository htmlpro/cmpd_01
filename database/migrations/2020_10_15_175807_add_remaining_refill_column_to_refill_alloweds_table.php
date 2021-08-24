<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRemainingRefillColumnToRefillAllowedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('refill_alloweds', function (Blueprint $table) {
            $table->text('remaining_refill')->nullable()->after('refill_allowed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('refill_alloweds', function (Blueprint $table) {
            $table->dropColumn(['prescriptions']);
        });
    }
}
