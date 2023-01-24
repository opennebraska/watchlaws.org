<?php

namespace App\Models;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'title',
        'tag',
        'starting_year',
        'ending_year',
        'prefile',
        'sine_die',
        'prior',
        'special',
    ];

    //region Relationships

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    //endregion
}
