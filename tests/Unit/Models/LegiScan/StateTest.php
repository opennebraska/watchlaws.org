<?php

namespace Tests\Unit\Models\LegiScan;

use Tests\TestCase;
use App\Models\LegiScan\Bill;
use App\Models\LegiScan\State;

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
