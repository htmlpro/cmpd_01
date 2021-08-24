<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('order_id')->nullable();
            $table->integer('provider_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('patient_id')->nullable();
            $table->integer('medication_id')->nullable();
            $table->integer('rx_id')->nullable();
            $table->string('source')->nullable();
            $table->integer('page_count')->nullable();
            $table->integer('attachment_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->softDeletes('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('orders');
    }

}
