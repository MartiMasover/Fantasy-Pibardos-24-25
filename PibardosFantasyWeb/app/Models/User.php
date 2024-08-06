<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'surname',
        'username',
        'pfp',
        'email',
        'password',
        'biography',
        'role_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    ################################
    #           RELACIONS          #
    ################################

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function jornades(): BelongsToMany
    {
        return $this->belongsToMany(Jornada::class, 'jornada_user', 'user_id', 'number')
                    ->withPivot('points', 'position')
                    ->withTimestamps();
    }

}
