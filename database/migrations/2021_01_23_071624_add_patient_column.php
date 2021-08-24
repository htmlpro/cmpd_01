<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPatientColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->integer('additional_identification_type')->nullable()->after('identification_number');
            $table->longText('additional_identification_number')->nullable()->after('identification_number');
            $table->string('location_code')->nullable()->after('identification_number');
            $table->string('country_of_non_us')->nullable()->after('identification_number');
            $table->string('animal_name')->nullable()->after('species');
            $table->longText('name_prefix')->nullable()->after('id');
            $table->longText('name_suffix')->nullable()->after('id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->integer('additional_identification_type')->nullable()->after('identification_number');
            $table->longText('additional_identification_number')->nullable()->after('identification_number');
            $table->string('location_code')->nullable()->after('identification_number');
            $table->string('country_of_non_us')->nullable()->after('identification_number');
            $table->string('animal_name')->nullable()->after('species');
            $table->longText('name_prefix')->nullable()->after('id');
            $table->longText('name_suffix')->nullable()->after('id');
        });
    }
}
