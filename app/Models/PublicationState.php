<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationState extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function pratice()
    {
        return $this->hasMany(Practice::class);
    }
    public static function stateId (string $slug){
        return PublicationState::get()->where('slug',$slug)->first()->id;
    }
}
