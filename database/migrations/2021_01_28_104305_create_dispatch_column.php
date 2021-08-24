<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dispatches', function (Blueprint $table) {
            $table->integer('person_drop_id_indentification')->nullable()->after('rph');
            $table->longText('person_drop_id_indentification_number')->nullable()->after('rph');
            $table->integer('relationship_person_dropping_id')->nullable()->after('rph');
            $table->integer('additional_person_drop_id_indentification')->nullable()->after('rph');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dispatches', function (Blueprint $table) {
            $table->integer('person_drop_id_indentification')->nullable()->after('rph');
            $table->longText('person_drop_id_indentification_number')->nullable()->after('rph');
            $table->integer('relationship_person_dropping_id')->nullable()->after('rph');
            $table->integer('additional_person_drop_id_indentification')->nullable()->after('rph');

        });
    }
}
