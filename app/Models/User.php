<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    #region Properties

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'first_name',
        'last_name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    #endregion

    #region Relationships

    function group_memberships()
    {
        return $this->hasMany(GroupMember::class);
    }
    function groups_owned()
    {
        return $this->hasMany(Group::class, 'owner_id');
    }

    #endregion

    #region Attributes

    public function getFullNameAttribute()
    {
        $nameParts = array_filter([$this->first_name, $this->last_name]);
        if ($nameParts)
        {
            return implode(' ', $nameParts);
        }

        return $this->email;
    }

    public function getGroupsAttribute()
    {
        $groups = $this->groups_owned;

        $memberships = $this->group_memberships;
        $groupsIn = $memberships->pluck('group');

        return $groups->merge($groupsIn)->where('type', 'group')->unique('id');
    }

    #endregion
}
