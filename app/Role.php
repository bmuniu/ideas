<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];
    const Admin = 'Administrator';

    public static function admin() {
        return self::where('role_name', self::Admin)->first();
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
