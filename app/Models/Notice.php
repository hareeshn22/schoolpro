<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

     protected $fillable = [
        'school_id',
        'student_id',
        'teacher_id',
        'user_type',
        'notice',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class)->withDefault();
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class)->withDefault();
    }
}
