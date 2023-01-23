<?php

namespace Tests\Unit\Models\LegiScan\Bill;

use App\Models\Bookmark;
use App\Models\Group;
use App\Models\Group\Workspace;
use App\Models\LegiScan\Bill;
use App\Models\LegiScan\Bill\History;
use App\Models\LegiScan\Bill\HistoryTimestamp;
use App\Models\User;
use App\Notifications\BillHasProgressed;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class HistoryTimestampTest extends TestCase
{
    /** @test */
    public function usersShouldBeNotifiedWhenBillHistoryProgresses()
    {
        Notification::fake();

        // SETUP

        // group -> members -> users
        $user1  = User::factory()->create();
        $user2  = User::factory()->create();
        $group = Group::factory()->create();
        $group->members()->attach($user1);
        $group->members()->attach($user2);

        // group -> workspaces -> bookmarks -> bills -> history
        $workspace = Workspace::factory()->create([
            'group_id' => $group->id,
        ]);
        Bill::factory()->count(3)->create();
        $bill = Bill::factory()->create();
        $billHistory = History::factory()->create([
            'bill_id' => $bill->bill_id,
            'history_action' => 'Hearing February 25, 2023',
        ]);
        Bookmark::factory()->create([
            'scope_type'        => get_class($workspace),  // Workspace
            'scope_id'          => $workspace->id,
            'bookmarkable_type' => get_class($bill),  // Bill
            'bookmarkable_id'   => $bill->id,
        ]);

        // TEST

        // Trigger created event
        HistoryTimestamp::factory()->create([
            'bill_id' => $billHistory->bill_id,
            'history_step' => $billHistory->history_step,
        ]);

        Notification::assertSentTo(
            [$user1, $user2],
            BillHasProgressed::class,
        );
    }
}
