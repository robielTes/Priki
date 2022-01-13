<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];


    public function opinions()
    {
        return $this->belongsToMany(Reference::class);
    }
}
