<?php

namespace App\Models\LegiScan\Bill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sast extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_sast';

    protected $primaryKey = null;

    public $incrementing = false;
}
