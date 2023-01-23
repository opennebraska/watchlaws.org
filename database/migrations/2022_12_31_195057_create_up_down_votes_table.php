<?php

use App\Models\User;
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
        Schema::create('up_down_votes', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class);
            $table->morphs('voteable');

            $table->string('type')->nullable();
            $table->boolean('direction');
            $table->string('reason')->nullable();

            $table->timestamps();

            // Indexes
            $table->unique(['user_id', 'voteable_type', 'voteable_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('up_down_votes');
    }
};
