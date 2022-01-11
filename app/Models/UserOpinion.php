<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOpinion extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function opinion()
    {
        return $this->belongsTo(Opinion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function canVote(int $opinionId)
    {
        return UserOpinion::get()->where('opinion_id', $opinionId)->where('user_id', auth()->user()->id)->first();
    }

    public static function addNewVote(int $opinionId, int $vote)
    {
        UserOpinion::create([
            'user_id' => auth()->user()->id,
            'opinion_id' => $opinionId,
            'comment' => "",
            'points' => $vote
        ]);
    }
    public static function updateVote(int $opinionId, int $vote)
    {
        $opinionVote =UserOpinion::find($opinionId);
        $opinionVote->points = $vote;
        $opinionVote->save();
    }
}
