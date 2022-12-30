<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stance extends Model
{
    use HasFactory;

    protected $table = 'ls_stance';

    protected $primaryKey = 'stance';
}
