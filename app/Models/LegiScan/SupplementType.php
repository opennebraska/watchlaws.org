<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplementType extends Model
{
    use HasFactory;

    protected $table = 'ls_supplement_type';

    protected $primaryKey = 'supplement_type_id';
}
