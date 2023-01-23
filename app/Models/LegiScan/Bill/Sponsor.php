<?php

namespace App\Models\LegiScan\Bill;

use App\Models\LegiScan\People;
use App\Models\LegiScan\SponsorType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sponsor extends Model
{
    use HasFactory;

    #region Properties

    protected $table = 'ls_bill_sponsor';

    protected $primaryKey = 'composite_id';

    #endregion

    #region Relationships

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }
    public function person()
    {
        return $this->belongsTo(People::class, 'people_id');
    }
    public function type()
    {
        return $this->belongsTo(SponsorType::class, 'sponsor_type_id');
    }

    #endregion
}