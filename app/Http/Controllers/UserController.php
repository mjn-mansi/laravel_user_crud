<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $userList = User::all();
        return view('users.index', ['userList' => $userList]);
    }

    public function create()
    {
        $gender = ['Male', 'Female'];
        return view('users.create', ['gender' => $gender]);
    }

    public function store(Request $request)
    {
        $userInput = $this->validate($request, [
            'name' => 'required|min:3|max:30|string',
            'email' => 'required|email|max:50|unique:users',
            'password' => 'required|min:5|max:100|confirmed',
            'phone' => 'required|max:15',
            'dob' => 'required|date',
            'gender' => 'required',
        ]);

        $userInput['password'] = bcrypt($userInput['password']);

        $user = User::create($userInput);

        if ($user) {
            $userMeta =  $user->userMeta()->create($userInput);
            if ($userMeta) {
                return redirect('/api/users')->with('success', 'Record added successfully');
            }
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $gender = ['Male', 'Female'];
        return view('users.edit', ['user' => $user, 'gender' => $gender]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $userInput = $this->validate($request, [
            'name' => 'required|min:3|max:30',
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore($user)],
            'phone' => 'required|max:15',
            'dob' => 'required|date',
            'gender' => ['required'],
        ]);

        $user->update($userInput);

        if ($user) {
            $userMeta =  $user->userMeta()->update(['phone' => $userInput['phone'], 'dob' => $userInput['dob'], 'gender' => $userInput['gender']]);
            if ($userMeta) {
                return redirect('/api/users')->with('success', 'Record updated successfully');
            }
        }
    }

    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect('/api/users')->with('success', 'Record deleted successfully');
        }
    }
}
