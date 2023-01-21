<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function example()
    {
        $user = User::factory()->create([
            'first_name' => 'first',
            'last_name' => 'last',
        ]);

        $this->assertEquals('first last', $user->full_name);
    }
}
