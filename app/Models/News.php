<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'category',
        'title',
        'video_link',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

}
