<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOpinion extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function opinion()
    {
        return $this->belongsTo(Opinion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function canVote(int $opinionId): bool
    {
        return UserOpinion::get()->where('opinion_id', $opinionId)->where('user_id', auth()->user()->id)->count() === 0;
    }

}
