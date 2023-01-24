<?php

use App\Models\Group;
use App\Models\User;
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
        Schema::create('invites', function (Blueprint $table) {
            $table->id();

            // From (e.g. group or friend invite)
            $table->morphs('scope');

            // Invite method
            $table->foreignIdFor(User::class)->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();

            $table->text('status');

            // Recipient metadata
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();

            $table->foreignIdFor(User::class, 'created_by')->nullable();
            $table->timestamps();

            // Indexes
            $table->unique(['scope_type', 'scope_id', 'user_id']);
            $table->unique(['scope_type', 'scope_id', 'email']);
            $table->unique(['scope_type', 'scope_id', 'mobile']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invites');
    }
};
