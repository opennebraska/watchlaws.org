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
        Schema::create('workspaces', function (Blueprint $table)
        {
            $table->id();

            $table->foreignIdFor(Group::class);
            $table->string('name');
            $table->string('state_abbr')->nullable();
            $table->text('description')->nullable();
            $table->foreignIdFor(User::class, 'owner_id');

            $table->foreignIdFor(User::class, 'created_by')->nullable();
            $table->timestamps();

            // Indexes
            $table->unique(['group_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workspaces');
    }
};
