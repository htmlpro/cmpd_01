<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStateToPmpDispenserLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pmp_dispenser_logs', function (Blueprint $table) {
            $table->string('state')->nullable()->after('rx_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pmp_dispenser_logs', function (Blueprint $table) {
            $table->string('state')->nullable()->after('rx_number');
        });
    }
}
