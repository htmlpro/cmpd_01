<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('rx_id')->nullable();
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('rx_fill_number')->nullable();
            $table->longText('formula')->nullable();
            $table->integer('log_id')->nullable();
            $table->string('schedule')->nullable();
            $table->string('quantity_prescribed')->nullable();
            $table->string('quantity_dispensed')->nullable();
            $table->string('units')->nullable();
            $table->string('daw')->nullable();
            $table->string('refills')->nullable();
            $table->integer('refills_allowed')->nullable();
            $table->dateTime('rx_exp_date')->nullable();
            $table->string('rx_origin')->nullable();
            $table->bigInteger('rx_serial')->nullable();
            $table->dateTime('refill_date')->nullable();
            $table->dateTime('date_written')->nullable();
            $table->dateTime('date_entered')->nullable();
            $table->integer('supply')->nullable();
            $table->string('sig')->nullable();
            $table->double('price',4,2)->nullable();
            $table->string('rx_state')->nullable();
            $table->string('third_party')->nullable();
            $table->string('manufacturer')->nullable();
            $table->longText('product_message')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('prescriptions');
    }
}            