<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\State;
use App\Models\Session;

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

    // /** @test */    // Bill is not yet migrated
    // public function sessionsHaveManyBills()
    // {
    //     $state   = State::factory()->create();
    //     $session = Session::factory()->create([
    //         'state_id' => $state->id,
    //     ]);
    //     Bill::factory()->create([
    //         'session_id'  => $session->id,
    //         'description' => 'Banning Flamingo Permits',
    //     ]);

    //     $this->assertInstanceOf(
    //         Bill::class,
    //         $session->bills->first()
    //     );

    //     $this->assertEquals(
    //         'Banning Flamingo Permits',
    //         $session->bills->first()->description
    //     );
    // }
}
