<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'ls_type';
    protected $primaryKey = 'bill_type_id';
}
