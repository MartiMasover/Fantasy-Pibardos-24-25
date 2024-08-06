<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Jornada extends Model
{
    use HasFactory;

    protected $primaryKey = 'number';

    protected $fillable = [
        'winner',
    ];

    protected $hidden = [];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'jornada_user', 'number', 'user_id')
                    ->withPivot('points', 'position')
                    ->withTimestamps();
    }
}
