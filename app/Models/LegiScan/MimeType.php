<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MimeType extends Model
{
    use HasFactory;

    protected $table = 'ls_mime_type';

    protected $primaryKey = 'mime_id';
}
