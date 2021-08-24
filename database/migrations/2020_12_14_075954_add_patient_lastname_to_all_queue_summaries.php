<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPatientLastnameToAllQueueSummaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('all_queue_summaries', function (Blueprint $table) {
            $table->longtext('patient_lastname')->nullable()->after('patient');
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
            $table->dropColumn(['patient_lastname', 'patient']);
        });
    }
}
