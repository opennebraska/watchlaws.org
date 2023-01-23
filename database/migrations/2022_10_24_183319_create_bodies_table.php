<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bodies', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();

            $table->string('name');
            $table->string('abbreviation');
            $table->string('role');
            $table->string('role_abbreviation');
            $table->unsignedBigInteger('state_id');

            $table->foreign('state_id')
                ->references('id')
                ->on('states');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bodies');
    }
};
