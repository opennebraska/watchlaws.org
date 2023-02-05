<?php

namespace Tests\Unit\Controllers\Group;

use App\Models\Bookmark;
use App\Models\Group;
use App\Models\Group\Workspace;
use App\Models\LegiScan\Bill;
use App\Models\LegiScan\Bill\History;
use App\Models\User;
use Carbon\Carbon;
use Tests\TestCase;

class HearingControllerTest extends TestCase
{
    /** @test */
    public function groupsHaveHearings()
    {
        $user = User::factory()->create();
        $group = Group::factory()
            ->hasAttached($user, relationship:'members')
            ->hasWorkspaces()
            ->create();

        $bill = Bill::factory()
            ->forState(['state_abbr' => 'NE', 'state_name' => 'Nebraska'])
            ->forSession(['year_start' => 2022, 'year_end' => 2022])
            ->hasHistory([
                'history_date' => Carbon::create(year:2022, tz:'America/Chicago'),
                'history_action' => 'hearing'
            ])
            ->hasHistory([
                'history_date' => Carbon::create(year:2022, tz:'America/Chicago'),
            ])
            ->create();

        Bookmark::factory()->create([
            'scope_type' => Workspace::class,
            'scope_id' => $group->workspaces[0]->id,
            'bookmarkable_type' => Bill::class,
            'bookmarkable_id' => $bill->id,
            'direction' => true,
        ]);

        $response = $this
            ->actingAs($user)
            ->withSession([
                $group->chosenStateKey() => 'NE',
                $group->chosenYearKey() => 2022,
            ])
            ->get(route('groups.hearings.index', [$group]));

        $response->assertViewHas('historyItems', $bill->history->where('history_action', 'hearing'));
    }

    /** @test */
    public function hearingsAreFilteredPerGroup()
    {
        // Create: group1 -> workspace1 --> bookmark1 --> bill1 -> history (hearing)
        // Create: group2 -> workspace2 --> bookmark2 -'
        //                              `-> bookmark3 --> bill2 -> history (hearing)
        // Create: group2 -> workspace3 --> bookmark4 -'
        // Create: group3 -> workspace3

        $user = User::factory()->create();

        $groups = Group::factory(3)
            ->hasAttached($user, relationship:'members')
            ->hasWorkspaces(2)
            ->create();

        $bills = Bill::factory(4)
            ->forState(['state_abbr' => 'NE', 'state_name' => 'Nebraska'])
            ->forSession(['year_start' => 2022, 'year_end' => 2022])
            ->hasHistory([
                'history_date' => Carbon::create(year:2022, tz:'America/Chicago'),
                'history_action' => 'hearing'
            ])
            ->create();

        $billForTwoWorkspacesInTwoGroups = $bills[0];
        $billForOneWorkspaceInOneGroup = $bills[1];
        $billForTwoWorkspacesInSameGroup = $bills[2];
        $billWithoutBookmarks = $bills[3];

        Bookmark::factory()->create([
            'scope_type' => Workspace::class,
            'scope_id' => $groups[0]->workspaces[0]->id,
            'bookmarkable_type' => Bill::class,
            'bookmarkable_id' => $billForTwoWorkspacesInTwoGroups->id,
            'direction' => true,
        ]);

        Bookmark::factory()->create([
            'scope_type' => Workspace::class,
            'scope_id' => $groups[1]->workspaces[0]->id,
            'bookmarkable_type' => Bill::class,
            'bookmarkable_id' => $billForTwoWorkspacesInTwoGroups->id,
            'direction' => true,
        ]);

        Bookmark::factory()->create([
            'scope_type' => Workspace::class,
            'scope_id' => $groups[1]->workspaces[0]->id,
            'bookmarkable_type' => Bill::class,
            'bookmarkable_id' => $billForOneWorkspaceInOneGroup,
            'direction' => true,
        ]);

        Bookmark::factory()->create([
            'scope_type' => Workspace::class,
            'scope_id' => $groups[1]->workspaces[0]->id,
            'bookmarkable_type' => Bill::class,
            'bookmarkable_id' => $billForTwoWorkspacesInSameGroup,
            'direction' => true,
        ]);

        Bookmark::factory()->create([
            'scope_type' => Workspace::class,
            'scope_id' => $groups[1]->workspaces[1]->id,
            'bookmarkable_type' => Bill::class,
            'bookmarkable_id' => $billForTwoWorkspacesInSameGroup,
            'direction' => true,
        ]);

        $this
            ->actingAs($user)
            ->withSession([
                $groups[0]->chosenStateKey() => 'NE',
                $groups[0]->chosenYearKey() => 2022,
            ])
            ->get(route('groups.hearings.index', [$groups[0]]))
            ->assertViewHas(
                'historyItems',
                History::where('bill_id', $billForTwoWorkspacesInTwoGroups->id)->get()
            );

        $this
            ->actingAs($user)
            ->withSession([
                $groups[0]->chosenStateKey() => 'NE',
                $groups[0]->chosenYearKey() => 2022,
            ])
            ->get(route('groups.hearings.index', [$groups[1]]))
            ->assertViewHas(
                'historyItems',
                History::whereIn('bill_id', [
                    $billForTwoWorkspacesInTwoGroups,
                    $billForOneWorkspaceInOneGroup,
                    $billForTwoWorkspacesInSameGroup,
                ])->get()
            );

        $response = $this
            ->actingAs($user)
            ->withSession([
                $groups[0]->chosenStateKey() => 'NE',
                $groups[0]->chosenYearKey() => 2022,
            ])
            ->get(route('groups.hearings.index', [$groups[2]]))
            ->assertViewHas(
                'historyItems',
                History::where('bill_id', -1)->get()
            );

    }
}
