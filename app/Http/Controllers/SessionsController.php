<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $attributes['email'])->first();

        if(isset($user) && Hash::check($attributes['password'], $user->password)){
            //session()->regenerate();
            auth()->login($user);
            return redirect('/')->with('success', 'Willkommen zurück!');
        }
        
        return back()
            ->withInput()
            ->withErrors([ 
            'email' => 'Falsche E-Mail oder Passwort!'
        ]);
    }
    //
    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'Bis bald!');
    }
}
