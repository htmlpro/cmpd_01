<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOriginCodeToRxOriginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rx_origins', function (Blueprint $table) {
            $table->text('origin_code')->nullable()->after('rx_origin_desc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rx_origins', function (Blueprint $table) {
            $table->dropColumn(['origin_code', 'rx_origin_desc']);
        });
    }
}
