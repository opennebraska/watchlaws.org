<?php

namespace App\Models\LegiScan\Bill;

use App\Models\LegiScan\Bill;
use App\Models\LegiScan\Committee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Referral extends Model
{
    use HasFactory;

    //region Properties

    protected $table = 'ls_bill_referral';

    protected $primaryKey = 'composite_id';

    //endregion

    //region Relationships

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }

    public function committee()
    {
        return $this->belongsTo(Committee::class, 'committee_id');
    }

    //endregion

    //region Attributes

    public function getStepAttribute()
    {
        return $this->referral_step;
    }

    public function getDateAttribute()
    {
        return $this->referral_date;
    }

    //endregion
}
