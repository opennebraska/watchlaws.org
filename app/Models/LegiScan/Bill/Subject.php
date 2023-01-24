<?php

namespace App\Models\LegiScan\Bill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_subject';

    protected $primaryKey = null;

    public $incrementing = false;
}
