<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillHistoryView extends Model
{
    use HasFactory;

    protected $table = 'lsv_bill_history';
    protected $primaryKey = 'composite_id';  // Requires underlying view to be rewritten.
}
