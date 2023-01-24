<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextType extends Model
{
    use HasFactory;

    protected $table = 'ls_text_type';

    protected $primaryKey = 'bill_text_type_id';
    public $incrementing = false;
}
