<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function index(){
        if(auth()->check()){
            return view('manage');
        }else{
            return view('index');
        }
    }
    public function create(){
        return view('session.create');
    }

    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'Correctly logout');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if(auth()->attempt($attributes)){
            return redirect('/')->with('success', 'Welcome back, ' . auth()->user()->name . ' ' . auth()->user()->surname);
        }else{
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified',
            ]);
        }


    }



}
