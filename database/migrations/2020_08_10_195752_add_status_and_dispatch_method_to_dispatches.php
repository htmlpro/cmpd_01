<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusAndDispatchMethodToDispatches extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('dispatches', function (Blueprint $table) {
            $table->smallInteger('dispatch_method')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('dispatches', function (Blueprint $table) {
            $table->dropColumn(['dispatch_method','status']);
        });
    }

}
