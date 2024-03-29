<?php

namespace App\Models;

use App\Models\Group\Member as GroupMember;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //region Properties

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'first_name',
        'last_name',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //endregion

    //region Relationships

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_members');
    }

    //endregion

    //region Attributes

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    //endregion
}
