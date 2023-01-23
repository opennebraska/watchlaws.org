<?php

use App\Models\Group;
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
        // Steps:
        // 1. Move the owner
        // 2. Drop the "owner" column

        foreach (Group::all() as $group)
        {
            $group->memberships()->updateOrCreate(
                [
                    'user_id' => $group->owner_id,
                ],
                [
                    'role' => 'Owner',
                ]
            );
        }

        Schema::table('groups', function (Blueprint $table) {
            $table->dropColumn('owner_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Not doing, since we are still on the very first alpha version.
    }
};
