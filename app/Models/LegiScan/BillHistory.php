<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillHistory extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_history';

    protected $primaryKey = 'composite_id';
}
