<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PharmacyMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_info_master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_info_source_code')->nullable();
            $table->string('source_entity_name')->nullable();
            $table->text('message')->nullable();
            $table->string('npi')->nullable();
            $table->string('ncpdp')->nullable();
            $table->string('dea')->nullable();
            $table->string('pharmacy_name')->nullable();
            $table->text('pharmacy_address_1')->nullable();
            $table->text('pharmacy_address_2')->nullable();
            $table->string('pharmacy_state')->nullable();
            $table->string('pharmacy_city')->nullable();
            $table->string('pharmacy_zip_code')->nullable();
            $table->string('pharmacy_phone')->nullable();
            $table->string('pharmacy_conatct_name')->nullable();
            $table->string('pharmacy_chain_site_no')->nullable();
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
        Schema::dropIfExists('pharmacy_info_master');
    }
}
