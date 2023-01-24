<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('committees', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();

            $table->string('name');
            $table->unsignedBigInteger('body_id');

            $table->foreign('body_id')
                ->references('id')
                ->on('bodies');
        });
    }

    public function down()
    {
        Schema::dropIfExists('committees');
    }
};
