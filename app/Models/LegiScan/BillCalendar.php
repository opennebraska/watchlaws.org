<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillCalendar extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_calendar';
    protected $primaryKey = 'composite_id';
}
