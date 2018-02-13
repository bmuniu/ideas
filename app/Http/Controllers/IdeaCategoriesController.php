<?php

namespace App\Http\Controllers;

use App\IdeaCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class IdeaCategoriesController extends Controller
{
    public function index() {
        $categories = IdeaCategory::all();
        return view('ideas.categories')->with('categories', $categories);
    }

    public function store() {
        $post = request()->validate(['category_name' => 'required|unique:idea_categories']);

        IdeaCategory::create($post);

        request()->session()->flash('success', 'Category has been added.');
        return redirect('qa-manager/idea/categories');
    }

    public function destroy($id) {
        try {
            IdeaCategory::destroy($id);
            request()->session()->flash('success', 'Category has been deleted.');
        } catch (QueryException $qe) {
            request()->session()->flash('error', 'Category is still in use and cannot be deleted.');
        }

        return redirect('qa-manager/idea/categories');
    }
}
