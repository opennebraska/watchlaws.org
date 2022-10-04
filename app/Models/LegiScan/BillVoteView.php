<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillVoteView extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_vote';

    protected $primaryKey = 'roll_call_id';
}
