<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TextType extends Model
{
    use HasFactory;

    protected $table = 'ls_text_type';

    protected $primaryKey = 'bill_text_type_id';
}
