<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stance extends Model
{
    use HasFactory;

    protected $table = 'ls_stance';
    protected $primaryKey = 'stance';
}
