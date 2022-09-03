<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SastType extends Model
{
    use HasFactory;

    protected $table = 'ls_sast_type';
    protected $primaryKey = 'sast_id';
}
