<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SportStudent extends Model
{
    use HasFactory;

    protected $table = 'sport_students';

    protected $fillable = [
        'sport_id',
        'student_id',
        'trainer_id',
    ];

    /**
     * Relationships
     */
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}

