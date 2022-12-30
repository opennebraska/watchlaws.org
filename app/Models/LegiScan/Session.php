<?php

namespace App\Models\LegiScan;

use App\Traits\Models\HasLegiScanShim;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Session extends Model
{
    use HasFactory;
    use HasLegiScanShim;

    protected $table = 'ls_session';
    protected $primaryKey = 'session_id';

    public $timestamps = false;

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'session_id');
    }
}
