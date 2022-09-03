<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillAmendmentView extends Model
{
    use HasFactory;

    protected $table = 'lsv_bill_amendment';
    protected $primaryKey = 'amendment_id';
}
