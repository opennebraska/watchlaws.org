<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillAmendment extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_amendment';
    protected $primaryKey = 'amendment_id';
}
