<?php

namespace App\Models\LegiScan\Bill;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progress extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_progress';

    protected $primaryKey = 'composite_id';

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