<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;


class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'school_id',
        'course_id',
        'first_name',
        'last_name',
        'photo',
        'birthdate',
        'father_name',
        'gender',
        'roll_no',
        'address',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];


    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function guardian()
    {
        return $this->hasOne(Guardian::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_student', 'student_id', 'group_id')
            ->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'student_id');
    }

    // Sports
    public function sports()
    {
        return $this->belongsToMany(Sport::class, 'sport_students');
    }

    // Events
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_participants')
            ->withPivot('practice_time') // add 'role' if needed
            ->withTimestamps();
    }

    // Accessor for full name
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    // Accessor for age
    public function getAgeAttribute()
    {
        return $this->birthdate
            ? Carbon::parse($this->birthdate)->age
            : null;
    }
}
