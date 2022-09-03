<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillVoteView extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_vote';
    protected $primaryKey = 'roll_call_id';
}
