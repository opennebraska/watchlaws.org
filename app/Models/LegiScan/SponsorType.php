<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SponsorType extends Model
{
    use HasFactory;

    protected $table = 'ls_sponsor_type';

    protected $primaryKey = 'sponsor_type_id';

    public function getDescriptionAttribute()
    {
        return $this->sponsor_type_desc;
    }
}
