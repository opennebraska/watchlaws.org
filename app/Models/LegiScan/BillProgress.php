<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillProgress extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_progress';
    protected $primaryKey = 'composite_id';
}
