<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Department;

class DepartmentsController extends Controller
{
    const qa_cordinator = 'QA Cordinator';

    public function index() {
        $departments = Department::all();
        $cordinators = User::where('position', self::qa_cordinator)->get();

        return view('departments.index', [
            'cordinators' => $cordinators
        ])->with('departments', $departments);
    }

    public function store() {
        $post = request()->validate(['department_name' => 'required|unique:departments', 'qa_cordinator' => 'required']);

        Department::create($post);

        request()->session()->flash('success', 'Department has been added.');
        return redirect('admin/departments');
    }

    public function destroy($id) {
        try {
            Department::destroy($id);
            request()->session()->flash('success', 'Department has been removed.');
        } catch (QueryException $qe) {
            request()->session()->flash('error', 'Could not delete deparment');
        }

        return redirect('admin/departments');
    }
}
