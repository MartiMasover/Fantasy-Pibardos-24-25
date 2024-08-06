<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hymn extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'audio'
    ];

    protected $hidden = [];
}
