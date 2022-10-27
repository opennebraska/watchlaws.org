<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();

            $table->string('name');
            $table->string('title');
            $table->string('tag');
            $table->string('starting_year');
            $table->string('ending_year');
            $table->boolean('prefile')->default(false);
            $table->boolean('sine_die')->default(false);
            $table->boolean('prior')->default(false);
            $table->boolean('special')->default(false);

            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')
                ->references('id')
                ->on('states');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
    }
};
