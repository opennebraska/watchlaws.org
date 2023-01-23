<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;

    //region Properties

    protected $table = 'ls_type';

    protected $primaryKey = 'bill_type_id';

    //endregion

    //region Attributes

    public function getNameAttribute()
    {
        return $this->bill_type_name;
    }

    public function getAbbreviationAttribute()
    {
        return $this->bill_type_abbr;
    }

    //endregion
}
