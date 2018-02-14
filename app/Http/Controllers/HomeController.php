<?php

namespace App\Http\Controllers;

use App\Department;
use App\Idea;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $_departments = [];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($deparments = Department::all()) {
            foreach ($deparments as $department) {
                $this->_departments[] = (object) [
                    'department_name' => $department->department_name,
                    'no' => Idea::where('department_id', $department->id)->count()
                ];
            }
        }

        return view('home', [
            'departments' => $this->_departments
        ]);
    }
}
