<?php

namespace App\Models;

use App\Models\Body;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'body_id',
    ];

    public function body()
    {
        return $this->belongsTo(Body::class);
    }
}
