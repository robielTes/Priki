<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function pratice()
    {
        return $this->belongsTo(Practice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function useOpinion()
    {
        return $this->hasMany(UserOpinion::class);
    }

    public function references()
    {
        return $this->belongsToMany(Reference::class);
    }

    public static function newOpinion(\Illuminate\Http\Request $request, int $id)
    {
        $request->validate([
            'opinion' => ['required', 'max:5000', 'min:5'],
        ]);
        Opinion::create([
            'description' => $request->opinion,
            'practice_id' => $id,
            'user_id' => auth()->user()->id,
        ]);
    }
}
