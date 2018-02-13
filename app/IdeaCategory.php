<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdeaCategory extends Model
{
    protected $guarded = ['id'];

    public function ideas() {
        return $this->hasMany(Idea::class);
    }
}
