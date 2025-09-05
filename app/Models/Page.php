<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    // Mass assignable attributes
    protected $fillable = [
        'app_name',
        'language',
        'name',
        'info',
    ];


}
