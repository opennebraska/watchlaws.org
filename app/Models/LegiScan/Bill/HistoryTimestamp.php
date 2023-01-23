<?php

namespace App\Models\LegiScan\Bill;

use App\Models\LegiScan\Bill;
use App\Models\User;
use App\Notifications\BillHasProgressed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;

class HistoryTimestamp extends Model
{
    use HasFactory;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function (HistoryTimestamp $historyTimestamp)
        {
            HistoryTimestamp::notifyUsersWhenBillHasProgressed($historyTimestamp->history);

        });

        static::updated(function (HistoryTimestamp $historyTimestamp)
        {
            HistoryTimestamp::notifyUsersWhenBillHasProgressed($historyTimestamp->history);
        });
    }

    public function history()
    {
        return $this->belongsTo(Bill::class);
    }

    private static function notifyUsersWhenBillHasProgressed(History $history)
    {
        if ($history->is_nebraska_hearing)
        {
            $users = collect();

            $history->bill->bookmarks->each(function($bookmark) use($users){
                $users->concat($bookmark->workspace->group->members);
            });

            Notification::send($users->unique(), new BillHasProgressed($history));
        }
    }
}
