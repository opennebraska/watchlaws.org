<?php

namespace Tests\Unit\Models;

use App\Models\Group;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function fullNameConcatenatesFirstNameAndLastName()
    {
        $user = User::factory()->create([
            'first_name' => 'first',
            'last_name'  => 'last',
        ]);

        $this->assertEquals('first last', $user->full_name);
    }

    /** @test */
    /** @test */
    public function usersCanSeeGroupsTheyBelongTo()
    {
        $user = User::factory()->create();
        $groups = Group::factory()->count(3)->create();
        $groups[0]->members()->attach($user);
        $groups[1]->members()->attach($user);

        $this->assertEquals(
            [$groups[0]->id, $groups[1]->id],
            $user->groups->pluck('id')->sort()->toArray(),
        );
    }
}
