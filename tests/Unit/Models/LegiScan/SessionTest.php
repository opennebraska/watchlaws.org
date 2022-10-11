<?php

namespace Tests\Unit\Models\LegiScan;

use Tests\TestCase;
use App\Models\LegiScan\Bill;
use App\Models\LegiScan\State;
use App\Models\LegiScan\Session;

class SessionTest extends TestCase
{
    /** @test */
    public function sessionsBelongToAState()
    {
        $state   = State::factory()->create();
        $session = Session::factory()->create([
            'state_id' => $state->id,
        ]);

        $this->assertInstanceOf(
            State::class,
            $session->state
        );

        $this->assertEquals(
            $state->name,
            $session->state->name
        );
    }

    /** @test */
    public function sessionsHaveManyBills()
    {
        $state   = State::factory()->create();
        $session = Session::factory()->create([
            'state_id' => $state->id,
        ]);
        Bill::factory()->create([
            'session_id' => $session->id,
            'description' => 'Banning Flamingo Permits',
        ]);

        $this->assertInstanceOf(
            Bill::class,
            $session->bills->first()
        );

        $this->assertEquals(
            'Banning Flamingo Permits',
            $session->bills->first()->description
        );
    }
}
