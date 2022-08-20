<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegiScanState extends Model
{
    use HasFactory;

    #region Properties

    /** The table associated with the model */
    protected $table = 'ls_state';

    /** The primary key associated with the table */
    protected $primaryKey = 'state_id';

    #endregion

}
