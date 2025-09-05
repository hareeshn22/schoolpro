<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSyllabus extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'course_id',
        'subject_id',
        'exam_id',
        'name',
    ];

    /**
     * Relationships
     */
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    // public function lesson()
    // {
    //     return $this->belongsTo(Lesson::class);
    // }

}
