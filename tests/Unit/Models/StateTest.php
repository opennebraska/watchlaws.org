<?php

namespace Tests\Unit\Models;

use App\Models\LegiScan\Bill;
use App\Models\State;
use Tests\TestCase;

class StateTest extends TestCase
{
    /** @test */
    public function statesHaveManyBills()
    {
        $state = State::factory()->create();

        Bill::factory()->create([
            'state_id'    => $state->id,
            'description' => 'A saucy little piece of legislation.',
        ]);

        $this->assertInstanceOf(
            Bill::class,
            $state->bills->first()
        );

        $this->assertEquals(
            'A saucy little piece of legislation.',
            $state->bills->first()->description
        );
    }
}
