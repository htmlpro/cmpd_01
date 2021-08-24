<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStageIdAndStageChangeAtToAllQueueSummaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('all_queue_summaries', function (Blueprint $table) {
            $table->integer('stage_id')->nullable()->after('stage');
            $table->string('stage_change_at')->nullable()->after('stage_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('all_queue_summaries', function (Blueprint $table) {
            $table->dropColumn(['stage_id', 'stage']);
            $table->dropColumn(['stage_change_at', 'stage_id']);
        });
    }
}
