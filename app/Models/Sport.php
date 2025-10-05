<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_id',
        'name',
        'icon_path'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function trainers()
    {
        return $this->belongsToMany(Trainer::class, 'sport_trainer');
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'sport_students');
    }

    public function timetables()
    {
        return $this->hasMany(SportTimetable::class);
    }

}
