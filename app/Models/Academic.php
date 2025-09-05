<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'category',
        'start_date',
        'end_date',
        'prev_exam',
        'pres_exam',
    ];



    // Relationship with the School model
    public function school()
    {
        return $this->belongsTo(School::class);
    } 
}
