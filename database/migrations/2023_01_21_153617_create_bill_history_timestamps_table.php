<?php

use App\Models\LegiScan\Bill\History;
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
        Schema::create('bill_history_timestamps', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(History::class, 'bill_id');
            $table->integer('history_step');
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
        Schema::dropIfExists('bill_history_timestamps');
    }
};
