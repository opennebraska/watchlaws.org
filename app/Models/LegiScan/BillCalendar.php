<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillCalendar extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_calendar';

    protected $primaryKey = 'composite_id';
}
