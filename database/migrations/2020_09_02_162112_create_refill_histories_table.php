<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefillHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refill_histories', function (Blueprint $table) {
            $table->increments('id');
			$table->string('order_id')->nullable();
            $table->string('rx_id')->nullable();
            $table->SmallInteger('consume_qty')->nullable();
            $table->SmallInteger('remaining_qty')->nullable();
			$table->string('refilled_from_order_id')->nullable();
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
        Schema::dropIfExists('refill_histories');
    }
}
