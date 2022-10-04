<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('name');
            $table->string('abbreviation');
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
