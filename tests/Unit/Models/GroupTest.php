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

        $firstUserInGroup  = User::factory()->create();
        $secondUserInGroup = User::factory()->create();

        Member::factory()->create([
            'group_id' => $group->id,
            'user_id'  => $firstUserInGroup->id,
        ]);

        Member::factory()->create([
            'group_id' => $group->id,
            'user_id'  => $secondUserInGroup->id,
        ]);

        $this->assertInstanceOf(
            User::class,
            $group->members->first(),
        );

        $this->assertEquals(
            [$firstUserInGroup->id, $secondUserInGroup->id],
            $group->members->pluck('id')->sort()->toArray(),
        );
    }

    /** @test */
    public function groupsCanBeScopedToUsers()
    {
        $groups = Group::factory()->count(2)->create();

        $userInTwoGroups  = User::factory()->create();
        $userInZeroGroups = User::factory()->create();

        $groups[0]->memberships()->create([
            'user_id' => $userInTwoGroups->id,
        ]);
        $groups[1]->memberships()->create([
            'user_id' => $userInTwoGroups->id,
        ]);

        $groupsForUserInTwoGroups = Group::query()
            ->hasMember($userInTwoGroups)
            ->get();

        $groupsForUserInZeroGroups = Group::query()
            ->hasMember($userInZeroGroups)
            ->get();

        $this->assertEquals(
            [$groups[0]->id, $groups[1]->id],
            $groupsForUserInTwoGroups->pluck('id')->sort()->toArray(),
        );

        $this->assertEquals(
            0,
            $groupsForUserInZeroGroups->count()
        );
    }

    /** @test */
    public function groupsCanBeScopedToWorkspaceBookmarks()
    {
        $group     = Group::factory()->create();
        $workspace = Workspace::factory()->create([
            'group_id' => $group->id,
        ]);

        Bill::factory()->count(5)->create();
        $bill = Bill::factory()->create();
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
