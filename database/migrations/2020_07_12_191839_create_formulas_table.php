<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulas', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('client_id')->nullable();
            $table->integer('formula_id')->nullable();
            $table->longText('formula_name')->nullable();
            $table->string('formula_short')->nullable();
            $table->string('speed_code')->nullable();
            $table->smallInteger('total_vials')->nullable();
            $table->string('created_by')->nullable();   
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('formulas');
    }
}
