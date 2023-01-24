<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    use HasFactory;

    protected $table = 'ls_variable';

    protected $primaryKey = 'name';

    public $incrementing = false;
}
