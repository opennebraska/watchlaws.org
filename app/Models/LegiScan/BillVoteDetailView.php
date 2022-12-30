<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillVoteDetailView extends Model
{
    use HasFactory;

    protected $table = 'lsv_bill_vote_detail';

    protected $primaryKey = 'composite_id';
}
