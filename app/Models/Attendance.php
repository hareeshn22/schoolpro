<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'student_id',
        'course_id',
        'attenddate',
        'timing',
        'status',
    ];

    public function getStatusAttribute($value)
    {
        return $value ? 'present' : 'absent';
    }

    public function getStatusTextAttribute()
    {
        return $this->attributes['status'] ? 'Present' : 'Absent';
    }
}
