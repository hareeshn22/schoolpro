<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
     // Mass-assignable attributes
    protected $fillable = [
        'school_id',
        // 'teacher_id', // Uncomment if you plan to add this back in the migration
        'course_id',
        'subject_id',
        'name',
        'review',
    ];

    /**
     * Relationships
     */
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    // Uncomment when teacher_id is used
    // public function teacher()
    // {
    //     return $this->belongsTo(Teacher::class);
    // }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

}
