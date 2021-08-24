<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vials', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('client_id')->nullable();
            $table->smallInteger('formula_id')->nullable();
            $table->smallInteger('vial')->nullable();
            $table->string('color')->nullable();
            $table->string('class')->nullable();
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
        Schema::dropIfExists('vials');
    }
}
