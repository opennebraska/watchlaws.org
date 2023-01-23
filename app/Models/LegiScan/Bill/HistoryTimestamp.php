<?php

namespace App\Models\LegiScan\Bill;

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
        static::created(function (HistoryTimestamp $historyTimestamp) {
            HistoryTimestamp::notifyUsersWhenBillHasProgressed($historyTimestamp->historyItem);
        });

        static::updated(function (HistoryTimestamp $historyTimestamp) {
            HistoryTimestamp::notifyUsersWhenBillHasProgressed($historyTimestamp->historyItem);
        });
    }

    public function historyItem()
    {
        return $this->belongsTo(History::class);
    }

    private static function notifyUsersWhenBillHasProgressed(History $historyItem)
    {
        if ($historyItem->is_nebraska_hearing) {
            $users = collect();

            $historyItem->bill->bookmarks->each(function ($bookmark) use ($users) {
                $users->concat($bookmark->workspace->group->members);
            });

            Notification::send($users->unique(), new BillHasProgressed($historyItem));
        }
    }
}
