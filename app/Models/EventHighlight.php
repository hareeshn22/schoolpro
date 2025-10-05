<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventHighlight extends Model
{
    use HasFactory;

    protected $table = 'event_highlights';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'event_id',
        'content',
    ];

    /**
     * Get the event that this highlight belongs to.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

}
