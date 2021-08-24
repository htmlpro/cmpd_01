<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PmpMatrixMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pmp_matrix_master', function (Blueprint $table) {
            $table->increments('id');
            $table->float('version',2, 1)->nullable();
            $table->string('pmp_state_code')->nullable();
            $table->string('field_code')->nullable();
            $table->string('field_type')->nullable();
            $table->smallInteger('rule')->nullable();
            $table->smallInteger('created_by')->nullable();
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
        Schema::dropIfExists('pmp_matrix_master');

    }
}
