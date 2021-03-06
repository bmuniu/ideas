<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'position',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function departments() {
        return $this->hasMany(Department::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function idea() {
        return $this->hasMany(Idea::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
