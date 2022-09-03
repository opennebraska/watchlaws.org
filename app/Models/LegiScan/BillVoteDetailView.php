<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillVoteDetailView extends Model
{
    use HasFactory;

    protected $table = 'lsv_bill_vote_detail';
    protected $primaryKey = 'composite_id';
}
