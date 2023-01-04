<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillSponsor extends Model
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
