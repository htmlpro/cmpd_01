<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PMPMatrixCronStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pmp_matrix_cron_status', function (Blueprint $table) {
            $table->increments('id');
            $table->text('transaction_date')->nullable();
            $table->text('transaction_number')->nullable();
            $table->text('state')->nullable();
            $table->text('response')->nullable();
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
        Schema::dropIfExists('pmp_matrix_cron_status');
    }
}
