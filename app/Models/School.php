<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'logo',
        'descr',
        'phone',
        'address'
    ];

    public function sportTimetables()
    {
        return $this->hasMany(SportTimetable::class);
    }


    public function competitions()
    {
        return $this->belongsToMany(Competition::class, 'competition_school');
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
