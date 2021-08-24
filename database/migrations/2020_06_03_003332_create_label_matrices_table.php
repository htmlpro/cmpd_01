<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabelMatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('label_matrices', function (Blueprint $table) {
            $table->increments('id');
			$table->string('client_name');
			$table->string('formula_name');
			$table->string('speedcode');
			$table->string('formula_id');
			$table->string('formula_short');
			$table->integer('num_of_vial');
			$table->string('vial');
			$table->string('color');
			$table->string('class');
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
        Schema::dropIfExists('label_matrices');
    }
}
