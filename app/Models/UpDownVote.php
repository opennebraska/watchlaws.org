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

    #region Static methods

    // UpDownVote::tally($bill->id, $group->id);
    // UpDownVote::votes($bill_id, $group->id);
    // UpDownVote::userVote($bill_id);
    // UpDownVote::userVoteUp($bill_id);
    // UpDownVote::userVoteDown($bill_id);
    // UpDownVote::userVoteClear($bill_id);

    public static function tally($bill_id, $group = null)
    {
        // A. Tally for all users
        // B. Tally for all users who belong to group and it's descendant groups
        throw new Exception('Not implemented');
    }

    public static function votes($bill_id, $group = null)
    {
        // A. Get for all users
        // B. Get for all users who belong to group and it's descendant groups
        throw new Exception('Not implemented');
    }

    public static function userVote($bill_id, $user_id = null)
    {
        throw new Exception('Not implemented');
    }

    public static function userVoteUp($bill_id, $user_id = null)
    {
        throw new Exception('Not implemented');
    }

    public static function voteDown($bill_id, $user_id = null)
    {
        throw new Exception('Not implemented');
    }

    public static function voteClear($bill_id, $user_id = null)
    {
        throw new Exception('Not implemented');
    }

    #endregion
}
