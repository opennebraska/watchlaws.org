<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegiScanBill extends Model
{
    use HasFactory;

    #region Properties

    /** The table associated with the model */
    protected $table = 'ls_bill';

    /** The primary key associated with the table */
    protected $primaryKey = 'bill_id';

    /** The attributes that should be cast */
    protected $casts = [
        'created' => 'datetime',
        'updated' => 'datetime',
    ];

    #endregion

    #region Relationships

    public function state() {

        return $this->belongsTo(LegiScanState::class, 'state_id');

    }

    #endregion

}
