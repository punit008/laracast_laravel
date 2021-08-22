<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * To create the register form
     *  
     * @return View
     */ 
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attribute = request()->validate(
            [
                'name'      => 'required|max:255',
                'username'  => 'required|max:255|unique:users,username',
                // 'username'  =>  ['required','max:255', Rule::unique('users', 'username')], // Alternative for username
                'email'     => 'required|email|max:255|unique:users,email',
                'password'  => 'required'
            ]
        );

        $attribute['password'] = bcrypt($attribute['password']);
        //Can use eloquent mutator
        $user = User::create($attribute);

        auth()->login($user);

        // session()->flash('success', 'Your account had been created.');
        return redirect('/posts')->with('success', 'Your account had been created.');
    }
}
