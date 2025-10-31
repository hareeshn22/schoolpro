<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;
    protected $fillable = [
        'competition_id',
        'school_id',
        'type',        // individual, doubles, mixed, team
        'title',       // team/pair name
        // 'lead_player_id',
    ];

    // Belongs to a competition
    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    // Belongs to a school
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    // Lead player (optional)
    // public function leadPlayer()
    // {
    //     return $this->belongsTo(Student::class, 'lead_player_id');
    // }

    // Entry has many players
    public function players()
    {
        return $this->hasMany(EntryPlayer::class);
    }
}
