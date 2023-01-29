<?php

namespace Tests\Unit\Models\LegiScan\Bill;

use App\Models\LegiScan\Bill\History as BillHistory;
use Carbon\Carbon;
use Tests\TestCase;

class HistoryTest extends TestCase
{
    /** @test */
    public function nebraskaDateHumanizeShowsCorrectMessageBeforeDuringAndAfterDate()
    {
        $history = BillHistory::factory()->create([
            'history_action' => 'Hearing June 10, 2022',
        ]);

        function makeInitialDate()
        {
            // Causes a day difference between 'America/Chicago' and UTC
            return Carbon::create(year:2022, month:6, day:10, hour:22, tz:'America/Chicago');
        }

        $this->travelTo(makeInitialDate()->subMonths(1));
        $this->assertEquals('1 month from now', $history->nebraska_hearing_date_humanized);

        $this->travelTo(makeInitialDate()->subWeeks(1));
        $this->assertEquals('1 week from now', $history->nebraska_hearing_date_humanized);

        $this->travelTo(makeInitialDate()->subDays(1));
        $this->assertEquals('1 day from now', $history->nebraska_hearing_date_humanized);

        $this->travelTo(makeInitialDate()->subHours(1));
        $this->assertEquals('Today', $history->nebraska_hearing_date_humanized);

        $this->travelTo(makeInitialDate()->subMinutes(1));
        $this->assertEquals('Today', $history->nebraska_hearing_date_humanized);

        $this->travelTo(makeInitialDate()->subSeconds(1));
        $this->assertEquals('Today', $history->nebraska_hearing_date_humanized);

        $this->travelTo(makeInitialDate()->addSeconds(1));
        $this->assertEquals('Today', $history->nebraska_hearing_date_humanized);

        $this->travelTo(makeInitialDate()->addMinutes(1));
        $this->assertEquals('Today', $history->nebraska_hearing_date_humanized);

        $this->travelTo(makeInitialDate()->addHours(1));
        $this->assertEquals('Today', $history->nebraska_hearing_date_humanized);

        $this->travelTo(makeInitialDate()->addDays(1));
        $this->assertEquals('1 day ago', $history->nebraska_hearing_date_humanized);

        $this->travelTo(makeInitialDate()->addWeeks(1));
        $this->assertEquals('1 week ago', $history->nebraska_hearing_date_humanized);

        $this->travelTo(makeInitialDate()->addMonths(1));
        $this->assertEquals('1 month ago', $history->nebraska_hearing_date_humanized);
    }
}
