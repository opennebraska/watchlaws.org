<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegiScanBillView extends Model
{
    use HasFactory;

    #region Properties

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ls_bill';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'bill_id';

    #endregion
}
