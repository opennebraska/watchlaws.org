<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpDownVote extends Model
{
    use HasFactory;

    #region Properties

    protected $guarded = [];

    protected $casts = [
        'direction' => 'boolean',
    ];

    #endregion
}
