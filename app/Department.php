<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class, 'qa_cordinator', 'id');
    }

    public function ideas() {
        return $this->hasMany(Idea::class);
    }
}
