<?php

namespace App\Models;

use App\Models\LegiScan\Bill;
use App\Notifications\BillHasProgressed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;

class BillHistoryTimestamps extends Model
{
    use HasFactory;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function (BillHistoryTimestamps $billHistoryTimestamps)
        {
            $bill_history = $billHistoryTimestamps->bill_history;

            if ($bill_history->is_nebraska_hearing)
            {
                $users = User::query()
                    ->whereHasBookmarksForBill($bill_history->bill)
                    ->distinct()
                    ->get();

                Notification::send($users, new BillHasProgressed($bill_history));
            }
        });

        static::updated(function (BillHistoryTimestamps $billHistoryTimestamps)
        {
            $bill_history = $billHistoryTimestamps->bill_history;

            if ($bill_history->is_nebraska_hearing)
            {
                $users = User::query()
                    ->whereHasBookmarksForBill($bill_history->bill)
                    ->distinct()
                    ->get();

                Notification::send($users, new BillHasProgressed($bill_history));
            }
        });
    }

    public function bill_history()
    {
        return $this->belongsTo(Bill::class);
    }
}
