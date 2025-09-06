<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'course_id',
        'name',
        'created_by',
        'is_archived',
    ];

    // 🔗 Relationships

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'created_by');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'group_student', 'group_id', 'student_id')
            ->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

}
