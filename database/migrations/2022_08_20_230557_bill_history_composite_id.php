<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ls_bill_history', function (Blueprint $table) {

            $table->string('composite_id')->virtualAs('concat(bill_id,"-",history_step)')->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ls_bill_history', function (Blueprint $table) {

            $table->dropColumn('composite_id');

        });
    }
};
