<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'fullname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $attributes = [
        'role_id' => '1',
    ];

    public function pratice()
    {
        return $this->hasMany(Practice::class);
    }

    public function changelog()
    {
        return $this->hasMany(Changelog::class);
    }

    public function opinion()
    {
        return $this->hasMany(Opinion::class);
    }

    public function useOpinion()
    {
        return $this->hasMany(UserOpinion::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public static function isModerator()
    {
        return auth()->user()->role->slug === 'MOD';
    }
}
