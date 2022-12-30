<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\HasEnumProperties;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasEnumProperties, HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'abbreviation',
        'biennium',
        'carry_over',
        'capitol',
        'latitude',
        'longitude',
    ];

    public $enumCarryOvers = ['OE', 'EO', 'NO'];

    // public function bills()
    // {
    //     // Not yet migrated
    //     return $this->hasMany(Bill::class, 'state_id');
    // }

    public function scopeNonNational($query)
    {
        $query->whereNotIn('abbreviation', ['DC', 'US']);
    }
}
