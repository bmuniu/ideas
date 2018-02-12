<?php

namespace App\Http\Controllers;

use App\Idea;
use App\IdeaCategory;
use Illuminate\Http\Request;

class IdeasController extends Controller
{
    public function postIdea() {
        $categories = IdeaCategory::all();
        return view('ideas.post')->with('ideas', $categories);
    }

    public function index() {
        $ideas = Idea::all();
        return view('ideas.index')->with('ideas', $ideas);
    }
}
