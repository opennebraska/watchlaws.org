<?php

use App\Models\Group;
use App\Models\User;
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
        Schema::create('group_members', function (Blueprint $table) {

            $table->id();

            $table->foreignIdFor(Group::class);
            $table->foreignIdFor(User::class);
            $table->string('role')->default('member');

            $table->foreignIdFor(User::class, 'created_by')->nullable();
            $table->timestamps();

            // Indexes
            $table->unique(['group_id', 'user_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_members');
    }
};
