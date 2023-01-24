<?php

namespace App\Models\LegiScan\Bill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplement extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_supplement';

    protected $primaryKey = 'supplement_id';
    public $incrementing = false;
}
