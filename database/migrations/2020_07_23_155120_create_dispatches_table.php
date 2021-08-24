<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('dispatches', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('dispatch_id')->nullable();
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('rx_id')->nullable();
            $table->integer('patient_id')->nullable();
            $table->integer('provider_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('dispatch_to_type')->nullable();
            $table->string('last_name')->nullable();
            $table->longText('address1')->nullable();
            $table->longText('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('tech')->nullable();
            $table->string('rph')->nullable();
            $table->smallInteger('created_by')->nullable();
            $table->smallInteger('updated_by')->nullable();
            $table->smallInteger('deleted_by')->nullable();
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
        Schema::dropIfExists('dispatches');
    }

}
