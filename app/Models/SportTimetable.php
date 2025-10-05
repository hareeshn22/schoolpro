<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportTimetable extends Model
{
    use HasFactory;

     use HasFactory;

    protected $fillable = [
        'school_id',
        'sport_id',
        'day_of_week',
        'start_time',
        'end_time',
    ];

    /**
     * A timetable belongs to a school.
     */
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    /**
     * A timetable belongs to a sport.
     */
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
