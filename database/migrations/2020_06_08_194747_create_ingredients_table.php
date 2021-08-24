<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('name');
            $table->string('genric_name')->default(NULL);
            $table->string('form')->default(NULL);
            $table->string('purity')->default(NULL);
            $table->string('strength')->default(NULL);
            $table->string('schedule')->default(NULL);
            $table->string('ndc')->default(NULL);
            $table->dateTime('price_date')->default(NULL);
            $table->string('price_code')->default(NULL);
            $table->integer('current_lotnumber');
            $table->double('wholesaler_pack_size');
            $table->string('wholesaler_pack_units')->default(NULL);
            $table->integer('stock_on_hands')->default('0');
            $table->integer('min_reorder_qty')->default('0');
            $table->dateTime('exp_date')->default(NULL);
            $table->integer('total_qty_used')->default('0');
            $table->integer('date_cleared_qty_used')->default('0');
            $table->dateTime('date_last_used')->default(NULL);
            $table->string('shape')->default(NULL);
            $table->string('picture')->default(NULL);
            $table->string('molecular_formula')->default(NULL);
            $table->string('common_uses')->default(NULL);
            $table->string('water_of_hydration')->default(NULL);
            $table->string('molecular_weight')->default(NULL);
            $table->string('melting_point')->default(NULL);
            $table->string('boiling_point')->default(NULL);
            $table->string('specific_gravity')->default(NULL);
            $table->string('specific_density')->default(NULL);         
            $table->string('ph_stability_range')->default(NULL);
            $table->string('storage_information')->default(NULL);
            $table->string('solubility')->default(NULL);
            $table->dateTime('packaged_date')->default(NULL);
            $table->double('unit_price')->default('0.00');
            $table->dateTime('unit_price_date')->default(NULL);
            $table->string('active_ingredient')->default(NULL);
            $table->double('package_cost')->default('0.00');
            $table->double('unit_cost')->default('0.00');
            $table->string('ipaddress')->default(NULL);
            $table->tinyInteger('status')->default('0');
            $table->string('created_by')->default(NULL);
            $table->string('updated_by')->default(NULL);
            $table->string('deleted_by')->default(NULL);
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
        Schema::dropIfExists('ingredients');
    }
}
