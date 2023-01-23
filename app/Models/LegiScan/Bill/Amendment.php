<?php

namespace App\Models\LegiScan\Bill;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Amendment extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_amendment';

    protected $primaryKey = 'amendment_id';
}
