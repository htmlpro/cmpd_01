<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFileNameToPmpDispenserLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pmp_dispenser_logs', function (Blueprint $table) {
            $table->longtext('file_name')->nullable()->after('tranaction_type');
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
            $table->dropColumn(['file_name', 'tranaction_type']);
        });
    }
}
