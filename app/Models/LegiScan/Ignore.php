<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ignore extends Model
{
    use HasFactory;

    protected $table = 'ls_ignore';

    protected $primaryKey = 'bill_id';

    public $incrementing = false;
}
