<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\User;

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
}
