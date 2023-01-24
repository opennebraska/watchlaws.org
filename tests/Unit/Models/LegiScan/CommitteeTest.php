<?php

namespace Tests\Unit\Models\LegiScan;

use App\Models\LegiScan\Body;
use App\Models\LegiScan\Committee;
use App\Models\LegiScan\State;
use Tests\TestCase;

class CommitteeTest extends TestCase
{
    /** @test */
    public function committeesBelongToABody()
    {
        $state = State::factory()->create();
        $body  = Body::factory()->create([
            'state_id' => $state->id,
        ]);

        $committee = Committee::factory()->create([
            'committee_body_id' => $body->body_id,
        ]);

        $this->assertInstanceOf(
            Body::class,
            $committee->body
        );

        $this->assertEquals(
            $body->name,
            $committee->body->name
        );
    }
}
