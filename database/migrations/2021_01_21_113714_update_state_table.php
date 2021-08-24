<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('states', function (Blueprint $table) {
            $table->integer('pmp_status')->nullable()->after('note');
            $table->integer('status')->nullable()->after('note');
            $table->string('license_no')->nullable()->after('note');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('states', function (Blueprint $table) {
            $table->integer('pmp_status')->nullable()->after('note');
            $table->integer('status')->nullable()->after('note');
            $table->string('license_no')->nullable()->after('note');
        });
    }
}
