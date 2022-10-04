<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillView extends Model
{
    use HasFactory;

    protected $table = 'lsv_bill';

    protected $primaryKey = 'bill_id';
}
