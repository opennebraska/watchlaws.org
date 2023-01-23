<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplementType extends Model
{
    use HasFactory;

    protected $table = 'ls_supplement_type';

    protected $primaryKey = 'supplement_type_id';
}
