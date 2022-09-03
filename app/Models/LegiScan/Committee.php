<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    use HasFactory;

    protected $table = 'ls_committee';
    protected $primaryKey = 'committee_id';
}
