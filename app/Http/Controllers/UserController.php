<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingFeilds = $request->validate([
            'name' => ['required', 'string', "min:2"],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $incomingFeilds['password'] = bcrypt($incomingFeilds['password']);
        User::create($incomingFeilds);

        return "Register function call";
    }   
};
