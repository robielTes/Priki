<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    public function domain(){
        return $this->belongsTo(Domain::class);
    }

    public function publicationState(){
        return $this->belongsTo(PublicationState::class);
    }
}
