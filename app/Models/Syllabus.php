<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $fillable = [
        'school_id',
        'course_id',
        'name'
    ];

    
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
