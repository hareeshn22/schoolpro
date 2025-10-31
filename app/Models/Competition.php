<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'event_name',
        'event_datetime',
        'event_place',
        'participation_method',
        'participation_category',
        'gender',
        'official_sponsor',
        'photo_path',
        'last_date_for_entries',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'event_datetime'       => 'datetime',
        'last_date_for_entries'=> 'date',
    ];


    public function schools()
    {
        return $this->belongsToMany(School::class, 'competition_school');
    }

}
