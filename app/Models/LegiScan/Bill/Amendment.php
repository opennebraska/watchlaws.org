<?php

namespace App\Models\LegiScan\Bill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amendment extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_amendment';

    protected $primaryKey = 'amendment_id';
    public $incrementing = false;
}
