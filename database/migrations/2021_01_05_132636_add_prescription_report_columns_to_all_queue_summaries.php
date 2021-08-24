<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrescriptionReportColumnsToAllQueueSummaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('all_queue_summaries', function (Blueprint $table) {
           $table->integer('fill_number')->nullable()->after('date_entered');
           $table->string('supply')->nullable()->after('fill_number');
           $table->string('fill_date')->nullable()->after('supply');
           $table->string('day_written')->nullable()->after('fill_date');
           $table->string('daw')->nullable()->after('day_written');
           $table->string('qty')->nullable()->after('daw');
           $table->string('drug')->nullable()->after('qty');
           $table->string('schedule')->nullable()->after('drug');
           $table->string('insurance')->nullable()->after('schedule');
           $table->text('sig')->nullable()->after('insurance');
           $table->integer('formula_id')->nullable()->after('sig');
           $table->string('therapeutic_class')->nullable()->after('formula_id');
           $table->string('drugspeed_code')->nullable()->after('therapeutic_class');
           $table->string('drug_strength')->nullable()->after('drugspeed_code');
           $table->string('drug_from')->nullable()->after('drug_strength');
           $table->integer('patient_id')->nullable()->after('drug_from');
           $table->longtext('patient_address1')->nullable()->after('patient_lastname');
           $table->longtext('patient_address2')->nullable()->after('patient_address1');
           $table->longtext('patient_city')->nullable()->after('patient_address2');
           $table->string('patient_state')->nullable()->after('patient_city');
           $table->longtext('patient_zip')->nullable()->after('patient_state');
           $table->longtext('patient_gender')->nullable()->after('patient_zip');
           $table->longtext('patient_phone')->nullable()->after('patient_gender');
           $table->text('doctor_address1')->nullable()->after('provider');
           $table->text('doctor_address2')->nullable()->after('doctor_address1');
           $table->string('doctor_city')->nullable()->after('doctor_address2');
           $table->string('doctor_state')->nullable()->after('doctor_city');
           $table->string('doctor_zip')->nullable()->after('doctor_state');
           $table->string('doctor_dea')->nullable()->after('doctor_zip');
           $table->string('doctor_phone')->nullable()->after('doctor_dea');
           $table->string('doctor_email')->nullable()->after('doctor_phone');
           $table->string('ship_date')->nullable()->after('ship_to');
           $table->string('total_price')->nullable()->after('tracking_num');
           $table->string('shiping_price')->nullable()->after('total_price');
           $table->string('refills')->nullable()->after('shiping_price');
           $table->string('refills_rem')->nullable()->after('refills');
           $table->string('log')->nullable()->after('refills_rem');
           $table->string('tech')->nullable()->after('log');
           $table->string('location_name')->nullable()->after('tech');
           $table->string('delivery_service')->nullable()->after('location_name');
           $table->string('delivery_date')->nullable()->after('delivery_service');
           $table->integer('ingredient_count')->nullable()->after('delivery_date');
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
            //
        });
    }
}
