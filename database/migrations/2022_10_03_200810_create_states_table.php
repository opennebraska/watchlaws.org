<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();
            $table->string('name');
            $table->string('abbreviation');
            $table->string('biennium');
            $table->string('carry_over');
            $table->string('capitol');
            $table->string('latitude');
            $table->string('longitude');
        });
    }

    public function down()
    {
        Schema::dropIfExists('states');
    }
};
