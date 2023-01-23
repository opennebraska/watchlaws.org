<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users (regular)
        $user = User::factory()->create([
            'first_name' => 'User',
            'last_name'  => 'Account',
            'email'      => 'user@example.com',
        ]);

        // Users (x8)
        // User::factory(8)->create();

        // Groups (x2)
        Group::factory(2)->create([
            'type'       => 'group',
            'state_abbr' => 'NE',
            'owner_id'   => $user->id,
        ]);

        // Workspaces (x4; 2 under each group)
        foreach (Group::roots()->get() as $group) {
            Group::factory(2)->create([
                'parent_id' => $group->id,
                'type'      => 'workspace',
                'owner_id'  => $user->id,
            ]);
        }

        // Topics (x12; 3 under each workspace)
        foreach (Group::workspaces()->get() as $workspace) {
            Group::factory(3)->create([
                'parent_id' => $workspace->id,
                'type'      => 'topic',
                'owner_id'  => $user->id,
            ]);
        }

        // Votes
        // Bookmarks
        // Tags
        // Invites
        // Subscriptions
    }
}
