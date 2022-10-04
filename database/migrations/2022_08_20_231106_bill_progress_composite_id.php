<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ls_bill_progress', function (Blueprint $table) {
            $table->string('composite_id')->virtualAs('bill_id || "-" || progress_step')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ls_bill_progress', function (Blueprint $table) {
            $table->dropColumn('composite_id');
        });
    }
};
