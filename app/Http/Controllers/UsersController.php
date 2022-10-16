<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function checkAdmin(){
        return (auth()->user()->admin_main) ? true : false;
    }

    public function index(){
        $users = User::first('id')->get();

        //user name und e-mail für alle außer main admin unkenntlich machen
        if(!$this->checkAdmin()){
            foreach($users as $user){
                $user['name'] = "*******";
                $user['email'] = "*******";
            }
        }

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create(){
        return view('users.create');
    }

    public function save(){
        $attributes = request()->validate([
            'name' => 'required|min:2|max:50',
            'info' => 'required|min:2|max:255',
            'email' => 'required|email|min:5|max:50|unique:users,email',
            'password' => 'required|min:8|max:50'
        ]);
        $attributes['password'] = Hash::make($attributes['password']);
        $user = User::create($attributes);

        return redirect('/')->with('success', 'Account created.');
    }

    public function edit(Request $request){
        $user = User::where('id', $request['id'])->firstOrFail();

        //user e-mail für alle außer main admin unkenntlich machen
        if(!$this->checkAdmin()){
            $user['name'] = "*******";
            $user['email'] = "*******";
        }

        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function editUser(Request $request){
        $attributes = $request->validate([
            'name' => 'required|min:2|max:50',
            'info' => 'sometimes|min:2|max:255',
            'email' => 'required|email|max:50',
            'admin' => 'nullable',
            'kd' => 'nullable'
        ]);

        $attributes['admin'] = (isset($attributes['admin']))?1:0;
        $attributes['kd'] = (isset($attributes['kd']))?1:0;

        if($this->checkAdmin()){
            User::where('id', $request->id)
            ->update(['name' => $attributes['name'],
                        'info' => $attributes['info'],
                        'email' => $attributes['email'],
                        'admin' => $attributes['admin'],
                        'kd' => $attributes['kd']]);

            return redirect()->to('/admin/users')->with('success', 'User edited.');
        }else{
            return redirect()->back()->withErrors(['Only Main-Admin is allowed to do this.']);
        }
    }
}
