<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('activated')->default(NULL);
            $table->timestamp('date_entered')->default(NULL);
            $table->integer('group_code')->default('0');
            $table->string('description')->default(NULL);
            $table->string('cd_txt')->default(NULL);
            $table->string('cd_description')->default(NULL);
            $table->integer('medispan_id')->default('0');
            $table->string('medispan_allergy_class')->default(NULL);
            $table->string('created_by')->default(NULL);
            $table->string('updated_by')->default(NULL);
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
        Schema::dropIfExists('allergies');
    }
}
