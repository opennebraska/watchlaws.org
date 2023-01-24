<?php

namespace App\Models\LegiScan\Bill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_reason';

    protected $primaryKey = 'composite_id';

    public $incrementing = false;
}
