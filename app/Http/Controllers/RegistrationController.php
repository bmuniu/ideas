<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    const QA_Cordinator = 'QA Cordinator';
    const QA_AM = 'Quality Assurance Manager';
    const Admin = 'Administrator';

    public function index() {
        $roles = Role::where('role_name', '<>', self::Admin)->get();
        $users = User::where('role_id', '<>', Role::admin()->id)->get();

        return view('users.index', [
            'cordinator' => self::QA_Cordinator,
            'qa_am' => self::QA_AM,
            'roles' => $roles,
            'users' => $users
        ]);
    }

    public function store() {
        $post = request()->validate(['name' => 'required', 'email' => 'required|unique:users', 'role_id' => 'required']);
        $post['position'] = (request()->has('position')) ? request('position') : '';
        $post['password'] = 123456;

        User::create($post);

        request()->session()->flash('success', 'User has been registered successfully.');
        return redirect('admin/register/user');
    }

    public function edit(User $user) {
        $roles = Role::where('role_name', '<>', self::Admin)->get();
        $users = User::where('role_id', '<>', Role::admin()->id)->get();

        return view('users.edit', [
            'cordinator' => self::QA_Cordinator,
            'qa_am' => self::QA_AM,
            'roles' => $roles
        ])->with('user', $user);
    }

    public function update() {
        $post = request()->validate(['name' => 'required', 'email' => 'required|unique:users,email,' . request('id'), 'role_id' => 'required']);
        $post['position'] = (request()->has('position')) ? request('position') : '';

        User::find(request('id'))
            ->update($post);

        request()->session()->flash('success', 'User details have been updated successfully.');
        return redirect('admin/register/user');
    }

    public function destroy($id) {
        try {
            User::destroy($id);

            request()->session()->flash('success', 'User details have been updated successfully.');
        } catch (QueryException $qe) {
            request()->session()->flash('error', 'User cannot be deleted!');
        }
        return redirect('admin/register/user');
    }
}
