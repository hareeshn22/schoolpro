<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guidance extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'course_id',
        'homework_id',
        'suggestions',
        'notes',
        'videos',
        // 'examples',
        // 'materials',
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

    public function homework()
    {
        return $this->belongsTo(Homework::class);
    }

}
