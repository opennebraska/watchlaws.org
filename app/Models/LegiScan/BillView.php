<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillView extends Model
{
    use HasFactory;

    protected $table = 'lsv_bill';
    protected $primaryKey = 'bill_id';
}
