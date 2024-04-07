<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


// Controller for APIs
class SessionControllerAPI extends Controller
{
    use HttpResponses;

    public function store(){
        $attributes = request()->validate([
            'email' =>['required', 'email'],
            'password' => ['required'],
            'api_token' => ['required'],
        ]);

        if(!Auth::attempt($attributes)){
            return $this->error("", "Credentials does not match", 401);
        }

        // Carichiamo l'user
        $user = User::query()
            ->where('email', $attributes['email'])
            ->first();

        return $this->success([
            'user' => $user,
            'token' =>$user->createToken('Api token of ' . $user->name)->plainTextToken,
        ]);

    }
}
