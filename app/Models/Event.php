<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'sport_id',
        'title',
        'event_date'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function notes()
    {
        return $this->hasMany(EventNote::class);
    }

    public function videos()
    {
        return $this->hasMany(EventVideo::class);
    }

    public function participants()
    {
        return $this->belongsToMany(Student::class, 'event_participants', 'event_id', 'student_id')
            ->withPivot('practice_time') // if you need extra fields
            ->withTimestamps();
    }
    // public function participants()
    // {
    //     return $this->hasMany(EventParticipant::class);
    // }



    public function highlights()
    {
        return $this->hasMany(EventHighlight::class);
    }

}
