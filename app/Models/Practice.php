<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function publicationState()
    {
        return $this->belongsTo(PublicationState::class);
    }

    public static function publication()
    {
        return Practice::all()->where('publication_state_id', 3);
    }

    public static function domainSize()
    {
        return Practice::all()->where('publication_state_id', 3)->groupBy('domain_id');
    }

    public static function publicationByDomain(string $slug)
    {

        return Practice::with('domain')->get()->where('domain.slug', $slug)->where('publication_state_id', 3);
    }

}
