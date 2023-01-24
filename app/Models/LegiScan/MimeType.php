<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MimeType extends Model
{
    use HasFactory;

    protected $table = 'ls_mime_type';

    protected $primaryKey = 'mime_id';

    public $incrementing = false;
}
