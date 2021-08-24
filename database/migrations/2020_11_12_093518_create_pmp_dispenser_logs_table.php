<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePmpDispenserLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pmp_dispenser_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tranaction_number')->nullable();
            $table->string('order_id')->nullable();
            $table->string('rx_number')->nullable();
            $table->integer('fill_number')->nullable();
            $table->string('tranaction_type')->nullable();
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
        Schema::dropIfExists('pmp_dispenser_logs');
    }
}
