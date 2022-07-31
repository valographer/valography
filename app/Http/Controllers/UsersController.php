<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
        $users = User::first('id')->get();

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create(){
        return view('users.create');
    }

    public function store(){
        $attributes = request()->validate([
            'name' => 'required|min:2|max:20',
            'info' => 'required|min:2|max:255',
            'email' => 'required|email|min:6|max:20|unique:users,email',
            'password' => 'required|min:8|max:20'
        ]);
        $attributes['password'] = Hash::make($attributes['password']);
        $user = User::create($attributes);

        return redirect('/')->with('success', 'Account created.');
    }

    public function edit(Request $request){
        $user = User::where('id', $request['id'])->firstOrFail();
        
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function editUser(Request $request){
        $attributes = $request->validate([
            'name' => 'required|min:2|max:20',
            'info' => 'sometimes|min:2|max:255',
            'email' => 'required|email|min:6|max:20',
            'admin' => 'nullable',
            'kd' => 'nullable'
        ]);
        
        $attributes['admin'] = (isset($attributes['admin']))?1:0;
        $attributes['kd'] = (isset($attributes['kd']))?1:0;

        User::where('id', $request->id)
        ->update(['name' => $attributes['name'],
                    'info' => $attributes['info'],
                    'email' => $attributes['email'],
                    'admin' => $attributes['admin'],
                    'kd' => $attributes['kd']]);

        return redirect()->to('/admin/users')->with('success', 'User edited successfully');
    }
}
