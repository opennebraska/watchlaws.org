<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ls_bill', function (Blueprint $table) {
            $table->index('status_date', 'ls_bill_status_date_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ls_bill', function (Blueprint $table) {
            $table->dropIndex('ls_bill_status_date_idx');
        });
    }
};
