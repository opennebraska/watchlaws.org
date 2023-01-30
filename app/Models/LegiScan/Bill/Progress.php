<?php

namespace App\Models\LegiScan\Bill;

use App\Models\LegiScan\Progress as LegiScanProgress;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_progress';

    protected $primaryKey = 'composite_id';

    public $incrementing = false;

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    public function event()
    {
        return $this->belongsTo(LegiScanProgress::class);
    }

    public function getDescriptionAttribute()
    {
        return $this->event->description;
    }
}
