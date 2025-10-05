<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportAttendance extends Model
{
    use HasFactory;

     protected $fillable = [
        'school_id',
        // 'course_id',
        'sport_id',
        'student_id',
        'attenddate',
        'status',   // true/false
        'remarks',
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
