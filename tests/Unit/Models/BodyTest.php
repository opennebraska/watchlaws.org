<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Body;
use App\Models\State;

class BodyTest extends TestCase
{
    /** @test */
    public function bodiesBelongToAState()
    {
        $state = State::factory()->create();
        $body  = Body::factory()->create([
            'state_id' => $state->id,
        ]);

        $this->assertInstanceOf(
            State::class,
            $body->state
        );

        $this->assertEquals(
            $state->name,
            $body->state->name
        );
    }
}
