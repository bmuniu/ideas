<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdeaReaction extends Model
{
    protected $guarded = ['id'];

    public static function reactionExists($reaction, $idea_id, $user_id){
        return self::where('reaction', $reaction)
            ->where('idea_id', $idea_id)
            ->where('user_id', $user_id)
            ->count();
    }

    public static function reactionCount($reaction, $idea_id, $user_id){
        return self::where('reaction', $reaction)
            ->where('idea_id', $idea_id)
            ->count();
    }

    public static function removeOtherReactions($reaction, $idea_id, $user_id){
        return self::where('reaction', $reaction)
            ->where('idea_id', $idea_id)
            ->where('user_id', $user_id)
            ->delete();
    }

    public static function popularIdeas() {
        return self::where('reaction', 1)->get();
    }
}
