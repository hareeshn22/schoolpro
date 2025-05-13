<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'teacher_id',
        'course_id',
        'subject_id',
        'title',
        'image',
        'workdate',
        'content',
    ];


    public function getStatusAttribute($value)
    {
        return $value ? 'done' : 'not done';
    }

    // Relationship with the School model
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    // Relationship with the teacher model
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // Relationship with the teacher model
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relationship with the subject model
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    
}
