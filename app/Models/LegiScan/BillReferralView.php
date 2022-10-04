<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillReferralView extends Model
{
    use HasFactory;

    protected $table = 'lsv_bill_referral';

    protected $primaryKey = '';  // bill_id, referral_step
}
