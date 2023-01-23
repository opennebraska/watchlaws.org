<?php

namespace App\Models\LegiScan\Bill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_calendar';

    protected $primaryKey = 'composite_id';
}
