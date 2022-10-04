<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'abbreviation',
        'capitol',
        'latitude',
        'longitude',
    ];

    public function bills()
    {
        return $this->hasMany(Bill::class, 'state_id');
    }
}
