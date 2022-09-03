<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillReferralView extends Model
{
    use HasFactory;

    protected $table = 'lsv_bill_referral';
    protected $primaryKey = '';  // bill_id, referral_step
}
