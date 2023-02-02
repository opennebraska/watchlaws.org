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
        $bill = Bill::factory()->create();
        Bookmark::factory()->create([
            'scope_type'        => Workspace::class,
            'scope_id'          => $workspace->id,
            'bookmarkable_type' => Bill::class,
            'bookmarkable_id'   => $bill->id,
        ]);

        $step = 1;

        // Test

        $historyPastNotificationWindow = History::factory()->create([
            'bill_id'        => $bill->id,
            'history_step'   => $step++,
            'history_date'   => now()->startOfDay()->subDays(10),
            'history_action' => 'Hearing February 25, 2023',
        ]);

        HistoryTimestamp::factory()->create([
            'bill_id'      => $historyPastNotificationWindow->bill_id,
            'history_step' => $historyPastNotificationWindow->history_step,
        ]);

        Notification::assertNothingSent();

        // Test

        $historyWithinNotificationWindow = History::factory()->create([
            'bill_id'        => $bill->id,
            'history_step'   => $step++,
            'history_date'   => now(),
            'history_action' => 'Hearing February 25, 2023',
        ]);

        HistoryTimestamp::factory()->create([
            'bill_id'      => $historyWithinNotificationWindow->bill_id,
            'history_step' => $historyWithinNotificationWindow->history_step,
        ]);

        Notification::assertSentTo(
            [$user1, $user2],
            BillHasProgressed::class,
        );

        // // Test

        // $historyOnSameDay = History::factory()->create([
        //     'bill_id'        => $bill->id,
        //     'history_step'   => 1,
        //     'history_date'   => now()->startOfDay()->subDays(5),
        //     'history_action' => 'Hearing February 25, 2023',
        // ]);

        // HistoryTimestamp::factory()->create([
        //     'bill_id'      => $historyOnSameDay->bill_id,
        //     'history_step' => $historyOnSameDay->history_step,
        // ]);

        // Notification::assertSentTo(
        //     [$user1, $user2],
        //     BillHasProgressed::class,
        // );

        // // Test

        // $historyInFutureWithinOneWeek = History::factory()->create([
        //     'bill_id'        => $bill->id,
        //     'history_step'   => 1,
        //     'history_date'   => now()->startOfDay()->subDays(5),
        //     'history_action' => 'Hearing February 25, 2023',
        // ]);

        // HistoryTimestamp::factory()->create([
        //     'bill_id'      => $historyInFutureWithinOneWeek->bill_id,
        //     'history_step' => $historyInFutureWithinOneWeek->history_step,
        // ]);

        // Notification::assertSentTo(
        //     [$user1, $user2],
        //     BillHasProgressed::class,
        // );

        // // Test

        // $historyInFuturePastOneWeek = History::factory()->create([
        //     'bill_id'        => $bill->id,
        //     'history_step'   => 1,
        //     'history_date'   => now()->startOfDay()->subDays(5),
        //     'history_action' => 'Hearing February 25, 2023',
        // ]);

        // HistoryTimestamp::factory()->create([
        //     'bill_id'      => $historyInFuturePastOneWeek->bill_id,
        //     'history_step' => $historyInFuturePastOneWeek->history_step,
        // ]);

        // Notification::assertSentTo(
        //     [$user1, $user2],
        //     BillHasProgressed::class,
        // );
    }
}
