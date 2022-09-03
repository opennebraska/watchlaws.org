<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillReasonView extends Model
{
    use HasFactory;

    protected $table = 'lsv_bill_reason';
    protected $primaryKey = 'composite_id';  // Requires underlying view to be rewritten.
}
