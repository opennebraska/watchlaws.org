<?php

namespace Tests\Unit\Models\LegiScan\Bill;

use App\Models\Bookmark;
use App\Models\Group;
use App\Models\Group\Workspace;
use App\Models\LegiScan\Bill;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class HistoryTimestampTest extends TestCase
{
    /** @test */
    public function usersShouldBeNotifiedWhenBillHistoryProgresses()
    {
        $this->markTestSkipped();
        Notification::fake();

        $user  = User::factory()->create();
        $group = Group::factory()->create();
        $group->members()->attach($user);

        $workspace = Workspace::factory()->create();
        $group->workspaces()->attach($workspace);

        $bill     = Bill::factory()->create();
        $bookmark = Bookmark::factory()->create([
            'scope_type'        => get_class($workspace),
            'scope_id'          => $workspace->id,
            'bookmarkable_type' => get_class($bill),
            'bookmarkable_id'   => $bill->id,
        ]);
        $workspace->bookmarks()->attach($bill);

        // $historyTimestamp
        //     ->historyItem (action)
        //     ->bill (number, title)
        //     ->bookmarks
        //
        // $bookmark
        //     ->workspace
        //     ->group
        //     ->members

        // Trigger HistoryTimestamp::create|update

        // Verify notifications were sent to the correct recipients, for BillHasProgressed (event)
    }
}
