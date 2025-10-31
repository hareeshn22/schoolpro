<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryPlayer extends Model
{
    use HasFactory;

        protected $fillable = [
        'entry_id',
        'student_id',
        // 'role',
    ];

    // Belongs to an entry
    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }

    // Belongs to a student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
