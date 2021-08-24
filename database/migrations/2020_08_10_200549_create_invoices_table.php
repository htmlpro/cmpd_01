<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dispatch_id')->nullable();
            $table->smallInteger('service_type')->nullable();
            $table->string('weight')->nullable();
            $table->smallInteger('package_type')->nullable();
            $table->string('dimension_l')->nullable();
            $table->string('dimension_w')->nullable();
            $table->string('dimension_h')->nullable();
            $table->string('tracking')->nullable();
            $table->string('order_id')->nullable();
            $table->string('price')->nullable();
            $table->string('delivery_price')->nullable();
            $table->smallInteger('created_by')->nullable();
            $table->smallInteger('updated_by')->nullable();
            $table->softDeletes('deleted_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('invoices');
    }

}
