<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillCalendarView extends Model
{
    use HasFactory;

    protected $table = 'lsv_bill_calendar';
    protected $primaryKey = 'composite_id';  // Requires underlying view to be rewritten.
}
