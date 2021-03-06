<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Department;
use App\Idea;
use App\IdeaCategory;
use App\IdeaReaction;
use Illuminate\Http\Request;

class IdeasController extends Controller
{
    private $_doc_path = '';
    const Admin = 'Administrator';
    const Staff = 'Staff';
    const Student = 'Student';

    public function postIdea() {
        $categories = IdeaCategory::all();
        $departments = Department::all();

        return view('ideas.post', [
            'departments' => $departments
        ])->with('categories', $categories);
    }

    public function index() {
        $ideas = Idea::latest()->get();
        return view('ideas.index')->with('ideas', $ideas);
    }

    public function store() {
        $post = request()->validate([
            'department_id' => 'required',
            'idea_category_id' => 'required',
            'idea' => 'required',
            'document' => 'file'
        ]);
        unset($post['document']);

        if(!request()->has('agree')) {
            request()->session()->flash('error', 'You must agree to the Terms and conditions');
            return redirect('post/idea');
        }
        $post['agree_to_tc'] = 1;

        if (request()->has('document')) {
            // upload document
            $path = request()->file('document')->store('public');
            $file_name = request('document')->hashName();
            $this->_doc_path = 'storage/' . $file_name;
            $post['document_file'] = $this->_doc_path;
        }

        if (request()->has('anonymous'))
            $post['anonymous'] = 1;

        $post['user_id'] = auth()->user()->id;
        Idea::create($post);

        request()->session()->flash('success', 'Your Idea has been posted.');
        return redirect('ideas');
    }

    public function download($idea_id) {
        $idea = Idea::find($idea_id);

        return response()->download($idea->document_file);
    }

    public function popular() {
        $popular_ideas = IdeaReaction::popularIdeas();
        $ideas = [];


        if (count($popular_ideas)) {
            foreach ($popular_ideas as $idea) {
                $ideas[$idea->idea_id] = Idea::find($idea->idea_id);
            }
        }

        return view('ideas.popular')->with('ideas', $ideas);
    }
}
