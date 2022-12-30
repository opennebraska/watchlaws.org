<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SastType extends Model
{
    use HasFactory;

    protected $table = 'ls_sast_type';

    protected $primaryKey = 'sast_id';
}
