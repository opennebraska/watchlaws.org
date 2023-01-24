<?php

namespace Tests\Unit\Notifications;

use App\Models\Bookmark;
use App\Models\Group;
use App\Models\Group\Workspace;
use App\Models\LegiScan\Bill;
use App\Models\LegiScan\Bill\History;
use App\Models\User;
use App\Notifications\BillHasProgressed;
use Tests\TestCase;

class BillHasProgressedTest extends TestCase
{
    /** @test */
    public function billHasProgressedReturnsMailMessageThatCanBeRendered()
    {
        // group -> members -> users
        $user1  = User::factory()->create();
        $user2  = User::factory()->create();
        $group  = Group::factory()->create();
        $group->members()->attach($user1);
        $group->members()->attach($user2);

        // group -> workspaces -> bookmarks -> bills -> history
        $workspace = Workspace::factory()->create([
            'group_id' => $group->id,
        ]);
        Bill::factory()->count(3)->create();
        $bill        = Bill::factory()->create();
        $history     = History::factory()->create([
            'bill_id'        => $bill->id,
            'history_action' => 'Hearing February 25, 2023',
        ]);
        Bookmark::factory()->create([
            'scope_type'        => get_class($workspace),  // Workspace
            'scope_id'          => $workspace->id,
            'bookmarkable_type' => get_class($bill),  // Bill
            'bookmarkable_id'   => $bill->id,
        ]);

        $message = (new BillHasProgressed($history))
                        ->toMail($user1)
                        ->render()
                        ->toHtml();

        $this->assertIsString($message);
    }
}
