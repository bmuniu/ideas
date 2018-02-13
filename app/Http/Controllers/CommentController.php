<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store($idea_id) {
        request(['comment' => 'required']);

        Comment::create([
            'comment' => request('comment'),
            'idea_id' => $idea_id,
            'user_id' => auth()->user()->id,
            'anonymous' => (request()->has('anonymous')) ? 1 : 0
        ]);

        request()->session()->flash('success', 'Comment has been added.');
        return redirect('ideas');
    }
}
