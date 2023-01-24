<?php

namespace Tests\Unit\Models;

use App\Models\Body;
use App\Models\State;
use Tests\TestCase;

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
