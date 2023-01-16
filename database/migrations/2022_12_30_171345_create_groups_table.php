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
        Schema::create('groups', function (Blueprint $table) {

            $table->id();

            $table->foreignIdFor(Group::class, 'parent_id')->nullable();
            $table->string('name');

            $table->string('type');
            $table->string('state_abbr')->nullable();
            $table->text('description')->nullable();

            $table->foreignIdFor(User::class, 'owner_id');

            $table->foreignIdFor(User::class, 'created_by')->nullable();
            $table->timestamps();

            // Indexes
            $table->unique(['parent_id', 'name']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
};
