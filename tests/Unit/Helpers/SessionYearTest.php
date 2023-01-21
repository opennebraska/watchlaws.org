<?php

namespace Tests\Unit\Helpers;

use App\Helpers\LegiScan\SessionYear;
use Tests\TestCase;
use App\Models\LegiScan\Session;

class SessionYearTest extends TestCase
{
    /** @test */
    public function listOfYearsAreEqualToStartAndEndYearsInSessions()
    {
        Session::factory()->create([
            'year_start' => 1,
            'year_end' => 2,
        ]);
        Session::factory()->create([
            'year_start' => 2,
            'year_end' => 3,
        ]);
        Session::factory()->create([
            'year_start' => 3,
            'year_end' => 4,
        ]);

        $years = app(SessionYear::class)->getAll();

        $this->assertTrue($years->duplicates()->isEmpty());

        $this->assertTrue($years->diff([1, 2, 3, 4])->isEmpty());
    }
}
