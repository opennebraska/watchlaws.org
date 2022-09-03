<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillReferral extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_referral';
    protected $primaryKey = 'composite_id';
}
