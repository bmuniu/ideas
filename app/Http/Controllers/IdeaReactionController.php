<?php

namespace App\Http\Controllers;

use App\IdeaReaction;
use Illuminate\Http\Request;

class IdeaReactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function react($idea_id, $reaction) {
        $user_id = auth()->user()->id;

        if (!IdeaReaction::reactionExists($reaction, $idea_id, $user_id)) {
            IdeaReaction::create([
                'idea_id' => $idea_id,
                'user_id' => $user_id,
                'reaction' => $reaction
            ]);

            // remove any other reaction
            IdeaReaction::removeOtherReactions(!$reaction, $idea_id, $user_id);
        } else {
            request()->session()->flash('error', "You already reacted to the post!");
        }

        return redirect('ideas');
    }
}
