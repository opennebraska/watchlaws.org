<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillReason extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_reason';
    protected $primaryKey = 'composite_id';
}
