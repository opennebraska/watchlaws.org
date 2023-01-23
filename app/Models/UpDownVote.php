<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UpDownVote extends Model
{
    use HasFactory;

    //region Properties

    protected $guarded = [];

    protected $casts = [
        'direction' => 'boolean',
    ];

    //endregion
}
