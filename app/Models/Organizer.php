<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Organizer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'school_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    // Relationships
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    // public function sports()
    // {
    //     return $this->belongsToMany(Sport::class, 'sport_trainer');
    // }


    // Accessors
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
