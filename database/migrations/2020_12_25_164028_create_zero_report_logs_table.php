<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZeroReportLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zero_report_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('transaction_date')->nullable();
            $table->text('transaction_number')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('state')->nullable();
            $table->text('file_name')->nullable();
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
        Schema::dropIfExists('zero_report_logs');
    }
}
