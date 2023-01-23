<?php

namespace App\Models\LegiScan\Bill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteDetail extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_vote_detail';

    protected $primaryKey = 'composite_id';

    public function person()
    {
        return $this->belongsTo(People::class, 'people_id');
    }

    public function vote()
    {
        return $this->belongsTo(Vote::class, 'vote_id');
    }
}
