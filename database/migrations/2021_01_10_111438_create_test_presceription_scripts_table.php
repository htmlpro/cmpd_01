<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPresceriptionScriptsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('test_presceription_scripts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id')->nullable();
            $table->string('rx_id')->nullable();
            $table->integer('rx_fill_number')->nullable();
            $table->string('supply')->nullable();
            $table->string('refill_date')->nullable();
            $table->string('date_written')->nullable();
            $table->string('daw')->nullable();
            $table->string('quantity_dispensed')->nullable();
            $table->string('schedule')->nullable();
            $table->string('insur')->nullable();
            $table->text('sig')->nullable();
            $table->integer('formula_id')->nullable();
            $table->string('therapeutic_class')->nullable();
            $table->string('speedcode')->nullable();
            $table->string('strength')->nullable();
            $table->string('drug_from')->nullable();
            $table->integer('p_id')->nullable();
            $table->longtext('p_add1')->nullable();
            $table->longtext('p_add2')->nullable();
            $table->longtext('p_city')->nullable();
            $table->string('p_state')->nullable();
            $table->longtext('p_zip')->nullable();
            $table->longtext('p_age')->nullable();
            $table->longtext('p_gender')->nullable();
            $table->longtext('p_phone')->nullable();
            $table->text('d_add1')->nullable();
            $table->text('d_add2')->nullable();
            $table->string('d_city')->nullable();
            $table->string('d_state')->nullable();
            $table->string('d_zip')->nullable();
            $table->string('d_dea')->nullable();
            $table->string('d_phone')->nullable();
            $table->string('d_email')->nullable();
            $table->string('client')->nullable();
            $table->string('ship_date')->nullable();
            $table->string('total_price')->nullable();
            $table->string('delivery_price')->nullable();
            $table->string('refill_remain')->nullable();
            $table->string('log')->nullable();
            $table->string('tech')->nullable();
            $table->string('location_name')->nullable();
            $table->string('service_type')->nullable();
            $table->integer('count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('test_presceription_scripts');
    }

}
