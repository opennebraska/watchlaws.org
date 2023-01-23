<?php

namespace Tests\Unit\Models\LegiScan\Bill;

use Tests\TestCase;
use Illuminate\Support\Facades\Notification;

class HistoryTimestampTest extends TestCase
{
    /** @test */
    public function usersShouldBeNotifiedWhenBillHistoryProgresses()
    {
        $this->markTestSkipped();

        // Notification::fake();

        // Setup

        // Trigger HistoryTimestamp::create|update

        // Verify notifications were sent to the correct recipients, for BillHasProgressed (event)
    }
}
