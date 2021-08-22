<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }
    public function store()
    {
        $attributes = request()->validate(
            [
                'email'     =>  'required|email',
                'password'  =>  'required'
            ]
        );

        if(auth()->attempt($attributes)){
            //session fixation
            session()->regenerate();

            return redirect('/posts')->with('success', 'Logged In');
        }

        throw   ValidationException::withMessages(
            [
                'email' =>  'Your provided credentials could not be verified'
            ]
        );
        // return back()
        //     ->withInput()
        //     ->withErrors(
        //         [
        //             'email' =>  'Your provided credentials could not be verified'
        //         ]
        //     );
    }
    public function destroy()
    {
        auth()->logout();

        return redirect('/posts')->with('success', 'Logout');
    }
}
