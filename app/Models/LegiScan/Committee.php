<?php

namespace App\Models\LegiScan;

use App\Traits\Models\HasLegiScanShim;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    use HasFactory;
    use HasLegiScanShim;

    //region Properties

    protected $table = 'ls_committee';

    protected $primaryKey = 'committee_id';

    public $incrementing = false;

    public $timestamps = false;

    //endregion

    //region Scopes

    public function body()
    {
        return $this->belongsTo(Body::class, 'committee_body_id');
    }

    //endregion

    //region Attributes

    public function getNameAttribute()
    {
        return $this->committee_name;
    }

    //endregion
}
