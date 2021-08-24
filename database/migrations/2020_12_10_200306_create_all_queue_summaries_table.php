<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllQueueSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_queue_summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stage')->nullable();
            $table->string('date_received')->nullable();
            $table->string('order_id')->nullable();
            $table->string('provider')->nullable();
            $table->string('date_entered')->nullable();
            $table->string('rx_id')->nullable();
            $table->longtext('patient')->nullable();
            $table->longtext('dob')->nullable();
            $table->string('medication')->nullable();
            $table->string('client')->nullable();
            $table->string('ship_to')->nullable();
            $table->string('dispatch_method')->nullable();
            $table->string('tracking_num')->nullable();
            $table->string('stage_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_queue_summaries');
    }
}
