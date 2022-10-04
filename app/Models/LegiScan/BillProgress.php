<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillProgress extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_progress';

    protected $primaryKey = 'composite_id';
}
