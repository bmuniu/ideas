<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $guarded = ['id'];

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function categories() {
        return $this->belongsTo(IdeaCategory::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
