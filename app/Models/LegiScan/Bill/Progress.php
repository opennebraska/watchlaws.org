<?php

namespace App\Models\LegiScan\Bill;

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
        return $this->belongsTo(Progress::class);
    }

    public function getDescriptionAttribute()
    {
        return $this->event->description;
    }
}
