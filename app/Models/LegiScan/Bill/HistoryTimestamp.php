<?php

namespace App\Models\LegiScan\Bill;

use App\Notifications\BillHasProgressed;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;

class HistoryTimestamp extends Model
{
    use HasFactory;

    protected $table = 'bill_history_timestamps';

    protected $fillable = [
        'bill_id',
        'history_step',
    ];

    protected static function booted()
    {
        static::created(function (HistoryTimestamp $historyTimestamp) {
            HistoryTimestamp::notifyUsersWhenBillHasProgressed($historyTimestamp->historyItem);
        });
    }

    public function historyItem()
    {
        return $this->belongsTo(History::class, 'bill_id', 'bill_id');
    }

    private static function notifyUsersWhenBillHasProgressed(History $historyItem)
    {
        if (dump($historyItem->date->shiftTimeZone('America/Chicago')->diffInDays(now('America/Chicago')->startOfDay(), absolute:false)) <= 7)
        {
            if ($historyItem->is_nebraska_hearing)
            {
                $users = collect();
                $historyItem->bill->bookmarks->each(function ($bookmark) use (&$users) {
                    $users = $users->concat($bookmark->scope->group->members);
                });

                Notification::send($users->unique(), new BillHasProgressed($historyItem));
            }
        }
    }
}
