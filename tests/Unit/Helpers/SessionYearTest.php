<?php

namespace Tests\Unit\Helpers;

use Tests\TestCase;
use App\Helpers\SessionYear;
use App\Models\LegiScan\Session;

class SessionYearTest extends TestCase
{
    /** @test */
    public function listOfYearsAreEqualToStartAndEndYearsInSessions()
    {
        Session::factory()->create([
            'year_start' => 1,
            'year_end'   => 2,
        ]);
        Session::factory()->create([
            'year_start' => 2,
            'year_end'   => 3,
        ]);
        Session::factory()->create([
            'year_start' => 5,
            'year_end'   => 5,
        ]);
        Session::factory()->create([
            'year_start' => 5,
            'year_end'   => 6,
        ]);

        $years = app(SessionYear::class)->getAll();

        $this->assertTrue($years->duplicates()->isEmpty());

        $this->assertEquals(
            [1, 2, 3, 5, 6],
            $years->sort()->values()->toArray(),
        );
    }
}
