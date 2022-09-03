<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $table = 'ls_party';
    protected $primaryKey = 'party_id';
}
