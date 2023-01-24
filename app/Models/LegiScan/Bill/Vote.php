<?php

namespace App\Models\LegiScan\Bill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'ls_bill_vote';

    protected $primaryKey = 'roll_call_id';

    public $incrementing = false;

    public function rollCallBody()
    {
        return $this->belongsTo(Body::class, 'roll_call_body_id');
    }

    public function details()
    {
        return $this->hasMany(VoteDetail::class, 'roll_call_id');
    }
}
