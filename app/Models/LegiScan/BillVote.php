<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillVote extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_vote';
    protected $primaryKey = 'roll_call_id';

    public function roll_call_body() {
        return $this->belongsTo(Body::class, 'roll_call_body_id');
    }

    public function details() {
        return $this->hasMany(BillVoteDetail::class, 'roll_call_id');
    }
}
