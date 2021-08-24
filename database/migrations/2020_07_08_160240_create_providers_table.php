<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('reg_address1')->nullable();
            $table->string('reg_address2')->nullable();
            $table->string('reg_city')->nullable();
            $table->string('reg_state')->nullable();
            $table->string('reg_zip')->nullable();
            $table->string('reg_country')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('fax')->nullable();
            $table->string('pager')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('bussiness_name')->nullable();
            $table->string('dea')->nullable();
            $table->dateTime('dea_exp_date')->nullable();
            $table->string('statelicense')->nullable();
            $table->dateTime('state_exp_date')->nullable();
            $table->string('npi')->nullable();
            $table->string('title')->nullable();
            $table->string('facility')->nullable();
            $table->string('supervising_provider')->nullable();
            $table->string('logo')->nullable();
            $table->string('ipaddress')->nullable();
            $table->tinyInteger('provider_status')->default('0');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
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
        Schema::dropIfExists('providers');
    }
}
