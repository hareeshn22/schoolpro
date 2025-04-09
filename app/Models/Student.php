<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
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
        'first_name',
        'last_name',
        'photo',
        'birthdate',
        'father_name',
        'gender',
        'roll_no',
        'address'
    ];

    
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function guardian()
    {
        return $this->hasOne(Guardian::class);
    }

    
}
