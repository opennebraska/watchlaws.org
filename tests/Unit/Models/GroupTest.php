<?php

namespace Tests\Unit\Models;

use App\Models\Group;
use App\Models\Group\Member;
use App\Models\Group\Workspace;
use App\Models\LegiScan\Bill;
use App\Models\User;
use Tests\TestCase;

class GroupTest extends TestCase
{
    /** @test */
    public function groupsHaveMembers()
    {
        $group = Group::factory()->create();
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        User::factory()->count(4)->create();
        Member::factory()->create([
            'group_id' => $group->id,
            'user_id'  => $user1->id,
        ]);
        Member::factory()->create([
            'group_id' => $group->id,
            'user_id'  => $user2->id,
        ]);

        $this->assertEquals(2, $group->members->count());
        $this->assertEquals(
            [$user1->id, $user2->id],
            $group->members->pluck('id')->sort()->toArray(),
        );
    }

    /** @test */
    public function groupsDontHaveMembersWhenNoneAdded()
    {
        $group = Group::factory()->create();

        $this->assertEquals(0, $group->members->count());
    }

    /** @test */
    public function groupsCanBeScopedToUsers()
    {
        $groups = Group::factory()->count(5)->create();
        $user1  = User::factory()->create();
        $user2  = User::factory()->create();
        User::factory()->count(5)->create();
        $groups[0]->memberships()->create([
            'user_id' => $user1->id,
        ]);
        $groups[1]->memberships()->create([
            'user_id' => $user1->id,
        ]);

        $groupsForUser1 = Group::query()
                            ->hasMember($user1)
                            ->get();

        $groupsForUser2 = Group::query()
                            ->hasMember($user2)
                            ->get();

        $this->assertEquals(
            [$groups[0]->id, $groups[1]->id],
            $groupsForUser1->pluck('id')->sort()->toArray(),
        );

        $this->assertEquals(0, $groupsForUser2->count());
    }

    /** @test */
    public function groupsCanBeScopedToWorkspaceBookmarks()
    {
        // group -> workspace
        $group = Group::factory()->create();
        Workspace::factory()->count(2)->create([
            'group_id' => $group->id,
        ]);
        $workspace = Workspace::factory()->create([
            'group_id' => $group->id,
        ]);

        // workspace -> bookmarks -> bill
        Bill::factory()->count(5)->create();
        $bill = Bill::factory()->create();  // Make sure $bill->id doesn't start with 1
        $workspace->bookmarks()->create([
            'bookmarkable_type' => Bill::class,
            'bookmarkable_id'   => $bill->id,
            'direction'         => true,
        ]);

        $groupsWithBookmarkedBill = Group::query()
                                        ->hasBookmarked($bill)
                                        ->get();

        $this->assertEquals(
            [$group->id],
            $groupsWithBookmarkedBill->pluck('id')->sort()->toArray(),
        );
    }
}
