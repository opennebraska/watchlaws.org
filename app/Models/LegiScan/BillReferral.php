<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillReferral extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_referral';

    protected $primaryKey = 'composite_id';
}
