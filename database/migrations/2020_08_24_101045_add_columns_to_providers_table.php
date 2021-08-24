<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('providers', function (Blueprint $table) {
            $table->smallInteger('client')->nullable()->after('provider_status');
            $table->string('provider_npi')->nullable()->after('client');
			$table->string('provider_supervisor')->nullable()->after('provider_npi');
			$table->string('provider_corporation')->nullable()->after('provider_supervisor');
			$table->string('licence')->nullable()->after('provider_corporation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('providers', function (Blueprint $table) {
            $table->dropColumn(['providers', 'client']);
            $table->dropColumn(['providers', 'provider_npi']);
			$table->dropColumn(['providers', 'provider_supervisor']);
            $table->dropColumn(['providers', 'provider_corporation']);
			$table->dropColumn(['providers', 'licence']);
        });
    }
}
