<?php

namespace App\Models;

use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\HasEnumProperties;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Body extends Model
{
    use HasFactory, HasEnumProperties;

    public $timestamps = false;

    protected $fillable = [
         'id',
         'state_id',
         'name',
         'abbreviation',
         'role',
         'role_abbreviation',
    ];

    public $enumNames = [
        'House of Delegates',
        'Senate',
        'House of Representatives',
        'State Assembly',
        'Legislature',
        'Assembly',
        'General Assembly',
        'State Assembly',
        'Joint Conference',
        'City Council',
    ];

    public $enumAbbreviations = [
        'House',
        'Senate',
        'House',
        'Assembly',
        'Legislature',
        'Assembly',
        'Assembly',
        'House',
        'Joint',
        'Council',
    ];

    public $enumRoles = [
        'Delegate',
        'Senator',
        'Representative',
        'Assemblymember',
        'Joint',
        'Councilmember',
    ];

    public $enumRoleAbbreviations = [
        'Del',
        'Sen',
        'Rep',
        'Asm',
        'Jnt',
        'Cnc',
    ];

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
