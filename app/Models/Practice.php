<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function opinion()
    {
        return $this->hasMany(Opinion::class);
    }

    public function publicationState()
    {
        return $this->belongsTo(PublicationState::class);
    }

    public static function publication()
    {
        return self::whereHas('publicationState',function ($q){
                $q->where('slug','PUB');
            })->get();
    }

    public static function publishedModifiedOnes($nbDays)
    {
        return self::where('updated_at', '>=', Carbon::now()->subDay($nbDays))
            ->whereHas('publicationState',function ($q){
                $q->where('slug','PUB');
            })->get();
    }

    public static function domainSize()
    {
        return self::whereHas('publicationState',function ($q){
            $q->where('slug','PUB');
        })->get()->groupBy('domain_id');
        //return Practice::all()->where('publication_state_id', 3)->groupBy('domain_id');
    }

    public static function publicationByDomain(string $slug)
    {
        return Practice::with('domain')->get()->where('domain.slug', $slug)->where('publication_state_id', 3);
    }

    public static function publishedOpinion($id)
    {
        return Practice::with('opinion')->where('id',$id)->first();
    }
    public static function UserPublishedOpinion($id){
        return self::find($id)
            ->whereHas('opinion',function ($q){
                $q->where('user_id',auth()->user()->id);
            })->get()->where('id',$id)->count();
    }
}
