<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdentificationAndIdentificationNumberToPatients extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('patients', function (Blueprint $table) {
            $table->string('identification')->nullable()->after('rph');
            $table->string('identification_number')->nullable()->after('identification');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn(['patients', 'identification']);
            $table->dropColumn(['patients', 'identification_number']);
        });
    }

}
